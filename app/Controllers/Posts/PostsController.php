<?php

namespace App\Controllers\Posts;

use App\Controllers\BaseController;
use App\Models\Category\Category;
use App\Models\Comment\Comment;
use App\Models\Post\Post;
use CodeIgniter\HTTP\ResponseInterface;

class PostsController extends BaseController
{
    public function category($name)
    {
        // Use the PostModel to interact with the database
        $postModel = new Post();

        // Get posts for the specified category
        $postCategory = $postModel->where('category', $name)
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->find();

        // Get category counts (SELECT COUNT(posts.category) as count, categories.name as category, categories.id as id FROM `posts` 
        //INNER JOIN categories on posts.category = categories.name GROUP BY(posts.category))
        $categories = $postModel->selectCount('category', 'count')
            ->select('categories.name as category, categories.id as id')
            ->join('categories', 'posts.category = categories.name')
            ->groupBy('posts.category')
            ->findAll();

        //Get Popular Posts
        $popularPosts = $postModel->orderBy('title', 'DESC')
            ->limit(3)
            ->find();

        return view('posts/category', compact('postCategory', 'name', 'categories', 'popularPosts'));
    }

    public function singlePost($id)
    {
        // Use the PostModel to interact with the database
        $postModel = new Post();
        $commentModel = new Comment();

        // Get post for the specified id 
        $singlePost = $postModel->find($id);

        // Get category counts
        $categories = $postModel->selectCount('category', 'count')
            ->select('categories.name as category, categories.id as id')
            ->join('categories', 'posts.category = categories.name')
            ->groupBy('posts.category')
            ->findAll();

        //Get Popular Posts
        $popularPosts = $postModel->orderBy('title', 'DESC')
            ->limit(3)
            ->find();

        // Get comments for the specified post_id
        $comments = $commentModel->where('post_id', $id)
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->find();

        // Get the total count of comments for the specified post_id
        $commentCount = $commentModel->where('post_id', $id)->countAllResults();

        // Get more post related to this post
        $morePosts = $postModel->whereNotIn('id', [$id])
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->find();

        // Check if the post with the given id exists
        if ($singlePost) {
            // If the post exists, pass it to the view
            return view('posts/singlePost', ['singlePost' => $singlePost, 'categories' => $categories, 'popularPosts' => $popularPosts, 'comments' => $comments, 'commentCount' => $commentCount, 'morePosts' => $morePosts]);
        } else {
            // If the post does not exist, handle accordingly (redirect, show an error, etc.)
            return view('posts/postNotFound');
        }
    }

    public function storeComment($id)
    {
        try {
            // Use the Comment model to interact with the database
            $commentModel = new Comment();

            // Get the currently authenticated user's username
            $userName = auth()->user()->username;

            // Prepare comment data
            $data = [
                'user_name' => $userName,
                'comments' => $this->request->getPost('comment'),
                'post_id' => $id,
            ];

            // Insert the comment into the database
            $commentModel->insert($data);

            // Set a success flash message
            session()->setFlashData('success', 'Your comment has been added!');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            log_message('error', $e->getMessage());

            // Set an error flash message
            session()->setFlashData('error', 'An error occurred while adding your comment. Please try again.');
        }

        // Redirect back to the blog post page
        return redirect()->to('posts/single/' . $id);
    }

    public function createPost()
    {
        $categoriesModel = new Category();
        $categories = $categoriesModel->findAll();

        return view('posts/create-post', ['categories' => $categories]);
    }

    public function storePost()
    {
        try {
            // Use the Post model to interact with the database
            $postModel = new Post();

            // Get the currently authenticated user's username
            $userName = auth()->user()->username;
            $userId = auth()->user()->id;

            // Get the image, title, category and body
            $image = $this->request->getFile('image');
            $image->move('public/assets/' . 'images');
            $title = $this->request->getPost('title');
            $body = $this->request->getPost('description');
            $category = $this->request->getPost('category');

            // Prepare post data
            $data = [
                'title' => $title,
                'body'  => $body,
                'image' => $image->getClientName(),
                'user_name' => $userName,
                'user_id' => $userId,
                'category' => $category
            ];

            // Insert the Post into the database
            $postModel->insert($data);

            // Set a success flash message
            session()->setFlashData('success', 'Your Post has been added!');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            log_message('error', $e->getMessage());

            // Set an error flash message
            session()->setFlashData('error', 'An error occurred while adding your post. Please try again.');
        }

        // Redirect back to the blog post page
        return redirect()->to('posts/create-post/');
    }

    public function deletePost($id)
    {
        try {
            $model = new Post();

            // Fetch the post by its ID
            $post = $model->find($id);

            // Check if the post exists
            if (!$post) {
                // Handle the case where the post does not exist
                return redirect()->to(base_url());
            }

            // Check if the user is authenticated and is the owner of the post
            if (auth()->user()->id !== (int) $post['user_id']) {
                return redirect()->to(base_url());
            } else {
                $model->delete($id);

                // Set a success flash message
                session()->setFlashData('success', 'Your Post has been deleted successfully!');
            }
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            log_message('error', $e->getMessage());

            // Set an error flash message
            session()->setFlashData('error', 'An error occurred while deleting your post. Please try again.');
        }

        return redirect()->to('posts/create-post/');
    }


    public function editPost($id)
    {
        $post = new Post();
        $categoriesModel = new Category();
        $singlePost = $post->find($id);
        if (!isset(auth()->user()->id)) {
            return redirect()->to(base_url());
        }
        if (auth()->user()->id !== (int) $singlePost['user_id']) {
            return redirect()->to(base_url());
        } else {
            $categories = $categoriesModel->findAll();
            return view('posts/edit-post', compact('singlePost', 'categories'));
        }
    }

    public function updatePost($id)
    {
        try {
            // Use the Post model to interact with the database
            $postModel = new Post();

            // Get the image, title, category and body
            $image = $this->request->getFile('image');

            // Check if a new image has been uploaded
            if ($image->isValid() && !$image->hasMoved()) {
                $image->move('public/assets/images');
                $imageName = $image->getClientName();
            } else {
                // If no new image is uploaded, retain the existing image name
                $imageName = $this->request->getPost('image');
            }

            $title = $this->request->getPost('title');
            $body = $this->request->getPost('description');
            $category = $this->request->getPost('category');

            // Prepare post data
            $data = [
                'title' => $title,
                'body'  => $body,
                'image' => $imageName,
                'category' => $category
            ];

            // Update the Post into the database
            $postModel->update($id, $data);

            // Set a success flash message
            session()->setFlashData('success', 'Your Post has been updated!');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            log_message('error', $e->getMessage());

            // Set an error flash message
            session()->setFlashData('error', 'An error occurred while updating your post. Please try again.');
        }

        // Redirect back to the blog post page
        return redirect()->to('posts/edit-post/' . $id);
    }
}
