<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class FrontController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(4);
    
        return view('front.index')->with('articles', $articles);
    }
}
