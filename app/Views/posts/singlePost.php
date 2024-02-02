<?php $this->extend('./layouts/app.php'); ?>
<?php $this->section('content'); ?>
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('<?= base_url('public/assets/images/' . $singlePost['image'] . '') ?>');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-6">
                <div class="post-entry text-center">
                    <h1 class="mb-4"><?= htmlspecialchars($singlePost['title']) ?></h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 me-3 d-inline-block"><img src="<?= base_url('public/assets/images/user.jpg') ?>" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By <?= $singlePost['user_name'] ?></span>
                        <span>&nbsp;-&nbsp; <?= date('M. jS, Y', strtotime($singlePost['created_at'])) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">

                <div class="post-content-body">
                    <p> <?= $singlePost['body'] ?> </p>
                </div>
                <?php if ($singlePost['user_id'] == auth()->user()->id) : ?>
                    <a href="<?= url_to('delete.post', $singlePost['id']) ?>" class="btn btn-danger">Delete</a>
                    <a href="<?= url_to('edit.post', $singlePost['id']) ?>" class="btn btn-warning text-white">Update</a>
                <?php endif ?>

                <div class="pt-5">
                    <p>Categories: <a href="#"><?= ucfirst($singlePost['category']) ?></a></p>
                </div>



                <div class="pt-5 comment-wrap">
                    <h3 class="mb-5 heading"><?= $commentCount ?> Comments</h3>
                    <ul class="comment-list">
                        <?php if ($comments) : ?>
                            <?php foreach ($comments as $comment) : ?>
                                <li class="comment">
                                    <div class="vcard">
                                        <img src="<?= base_url('public/assets/images/user.jpg') ?>" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3><?= $comment['user_name'] ?></h3>
                                        <div class="meta"><?= $comment['created_at'] ?></div>
                                        <p><?= $comment['comments'] ?></p>
                                        <p><a href="#" class="reply rounded">Reply</a></p>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        <?php else : ?>
                            <p>No comments yet! Be the first to leave a comment.</p>
                        <?php endif; ?>
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <?php if (session()->has('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->has('error')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session('error') ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="mb-5 heading">Leave a comment</h3>
                        <form action="<?= base_url('/posts/add-comments/' . $singlePost['id'] . '') ?>" class="p-5 bg-light" method="post">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">

                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                        <img src="images/person_2.jpg" alt="Image Placeholder" class="img-fluid mb-3">
                        <div class="bio-body">
                            <h2>Hannah Anderson</h2>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                            <p><a href="#" class="btn btn-primary btn-sm rounded px-2 py-2">Read my bio</a></p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            <?php foreach ($popularPosts as $popularPost) : ?>
                                <li>
                                    <a href="<?= base_url('posts/single/' . $popularPost['id'] . '') ?>">
                                        <img src="<?= base_url('public/assets/images/' . $popularPost['image'] . '') ?>" alt="Image placeholder" class="me-4 rounded">
                                        <div class="text">
                                            <h4><?= $popularPost['title'] ?></h4>
                                            <div class="post-meta">
                                                <span class="mr-2"><?= date('M. jS, Y', strtotime($popularPost['created_at'])) ?> </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        <?php foreach ($categories as $category) : ?>
                            <li><a href="<?= base_url('posts/category/' . $category['category'] . '') ?>"><?= $category['category'] ?> <span>(<?= $category['count'] ?>)</span></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <!-- END sidebar-box -->


            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>


<!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-uppercase text-black">More Blog Posts</div>
        </div>
        <div class="row">
            <?php foreach ($morePosts as $morePost) : ?>
                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="<?= base_url('/posts/single/' . $morePost['id'] . '') ?>" class="img-link">
                            <img src="<?= base_url('public/assets/images/' . $morePost['image'] . '') ?>" alt="Image" class="img-fluid">
                        </a>
                        <span class="date"><?= date('M. jS, Y', strtotime($morePost['created_at'])) ?></span>
                        <h2><a href="<?= base_url('/posts/single/' . $morePost['id'] . '') ?>"><?= $morePost['title'] ?></a></h2>
                        <p><?= substr($morePost['body'], 0, 50) ?></p>
                        <p><a href="<?= base_url('/posts/single/' . $morePost['id'] . '') ?>" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End posts-entry -->
<?php $this->endsection() ?>