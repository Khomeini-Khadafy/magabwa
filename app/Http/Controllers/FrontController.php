<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FrontController;
use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $categories = Category::all();

        // menampilkan article berdasarkan [not_featured]
        $articles = ArticleNews::with(['category'])
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(6)
        ->get();

        // menampilkan article berdasarkan [featured]
        $featured_articles = ArticleNews::with(['category'])
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->take(3)
        ->get();

        $authors = Author::all();

        return view ('front.index', compact('categories', 'articles', 'authors', 'featured_articles'));
    }
}
