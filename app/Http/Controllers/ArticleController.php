<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Articles index
    public function articlesIndex(){
        $articles = Article::orderBy('id', 'DESC')->get();
        return view('dashboard.articles-index', [
            'articles' => $articles
        ]);
    }

    // View create article form
    public function create(){
        return view('articles/create');
    }

    // Store article in database
    public function store(Request $request){

    }
}
