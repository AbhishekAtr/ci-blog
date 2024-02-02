<?php

namespace App\Controllers;

use App\Models\Post\Post;

class Home extends BaseController
{
    public function index(): string
    {
        $posts = new Post();
        $data = $posts->select('*')->get(2)->getResult();
        $dataOnePosts = $posts->select('*')->get(1)->getResult();
        $dataTwoPosts = $posts->select('*')->orderBy('id', 'DESC')->get(2)->getResult();

        //Business Section 
        $businessPosts = $posts->select('*')->where('category', 'business')
            ->orderBy('id', 'DESC')->get(2)->getResult();
        $businessThreePosts = $posts->select('*')->where('category', 'business')
            ->orderBy('title', 'DESC')->get(3)->getResult();
        $businessFourPosts = $posts->select('*')->where('category', 'business')
            ->orderBy('title', 'DESC')->get(4)->getResult();

        //Culture Section
        $culturePosts = $posts->select('*')->where('category', 'culture')
            ->orderBy('id', 'DESC')->get(2)->getResult();
        return view('home', compact(
            'data',
            'dataOnePosts',
            'dataTwoPosts',
            'businessPosts',
            'businessThreePosts',
            'businessFourPosts',
            'culturePosts'
        ));
    }
}
