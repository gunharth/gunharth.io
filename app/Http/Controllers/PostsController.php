<?php

namespace App\Http\Controllers;

use App\Content\Posts;

class PostsController
{
    public function index(Posts $posts)
    {
        return view('posts.index', [
            'paginator' => $posts->published()->simplePaginate(10)
        ]);
    }

    public function page($page, Posts $posts)
    {
        return view('posts.index', [
            'paginator' => $posts->paginate(1, 'page', $page),
        ]);
    }

    //public function show($year, $slug, Posts $posts)
    public function show($slug, Posts $posts)
    {
        return view('posts.show', [
            //'post' => $posts->find($year, $slug),
            'post' => $posts->find($slug),
        ]);
    }
}
