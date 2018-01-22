<?php

namespace App\Http\Controllers;

use App\Content\Articles;

class ArticlesController
{
    public function index(Articles $articles)
    {
        return view('articles.index', [
            'articles' => $articles->all()->groupBy('category'),
        ]);
    }

    public function page($page, Articles $articles)
    {
        return view('articles.index', [
            'paginator' => $articles->paginate(20, 'page', $page),
        ]);
    }

    public function show($slug, Articles $articles)
    {
        return view('articles.show', [
            'article' => $articles->find($slug),
        ]);
    }
}
