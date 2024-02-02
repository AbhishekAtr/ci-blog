<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('/posts/category/(:any)', 'Posts\PostsController::category/$1');
$routes->get('/posts/single/(:num)', 'Posts\PostsController::singlePost/$1');
$routes->post('/posts/add-comments/(:num)', 'Posts\PostsController::storeComment/$1');
$routes->get('/posts/create-post', 'Posts\PostsController::createPost');
$routes->post('/posts/store-post', 'Posts\PostsController::storePost', ['as' => 'store.post']);
$routes->get('/posts/delete-post/(:num)', 'Posts\PostsController::deletePost/$1', ['as' => 'delete.post']);
$routes->get('/posts/edit-post/(:num)', 'Posts\PostsController::editPost/$1', ['as' => 'edit.post']);
$routes->post('/posts/update-post/(:num)', 'Posts\PostsController::updatePost/$1', ['as' => 'update.post']);

service('auth')->routes($routes);
