<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FrontController;
use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\BannerAdvertisement;
use App\Models\Category;

class FrontController extends Controller
{
    public function index()
    {
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

        // untuk bannerads atau iklan
        $bannerads = BannerAdvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
        // ->take()
            ->first();

        // buat variabel baru lalu ambil modelnya ArticleNews| whereHas(dimana) masuk ke relasi category pada model articleNews
        $entertaiment_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Entertaiment');
        })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        $entertaiment_articles_featured = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Entertaiment');
        })
            ->where('is_featured', 'featured')
            ->inRandomOrder()
            ->first();

        return view('front.index',
            compact(
                'entertaiment_articles_featured',
                'entertaiment_articles',
                'categories',
                'articles',
                'authors',
                'featured_articles',
                'bannerads'
            ));
    }
}
