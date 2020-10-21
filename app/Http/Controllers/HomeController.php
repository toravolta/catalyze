<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $article = Article::with('user')->get();

        return view('home', ['articles' => $article]);
    }

    public function show($id)
    {
        $article = Article::with('user')->find($id);

        return view('article.view', ['article' => $article]);
    }
}
