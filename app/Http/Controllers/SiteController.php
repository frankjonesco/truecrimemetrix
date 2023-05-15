<?php

namespace App\Http\Controllers;

use Carbon;
use App\Models\Article;
use App\Models\Criminal;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    // View homepage
    public function home(){
        $articles = Article::orderBy('id', 'DESC')->where('status', 'public')->get();
        return view('home', [
            'articles' => $articles
        ]);
    }

    // View terms
    public function viewTerms(){
        return view('terms');
    }
}
