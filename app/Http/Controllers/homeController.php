<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index() {
        $articles = Article::latest()->paginate(Article::PAGE_COUNT);
        return view('homepage', compact('articles'));
    }
}
