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

        // menampilkan article berdasarkan [not_featured] ->all Post
        $articles = ArticleNews::with(['category'])
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        // menampilkan article berdasarkan [featured] -> carausel
        $featured_articles = ArticleNews::with(['category'])
            ->where('is_featured', 'featured')
            ->inRandomOrder()
            ->take(3)
            ->get();
        // End menampilkan article berdasarkan [not_featured & Featured] -> carausel & not carausel

        $authors = Author::all();

        // untuk bannerads atau iklan
        $bannerads = BannerAdvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
        // ->take()
            ->first();

        // ini article untuk Entertaiment per category
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
        // End ini article untuk Entertaiment per category

        // ini article untuk business per category
        $sport_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Sport');
        })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        $sport_articles_featured = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Sport');
        })
            ->where('is_featured', 'featured')
            ->inRandomOrder()
            ->first();
        // End ini article untuk business per category

        return view('front.index',
            compact(
                'sport_articles',
                'sport_articles_featured',

                'entertaiment_articles_featured',
                'entertaiment_articles',

                'articles',
                'featured_articles',

                'categories',
                'authors',
                'bannerads'
            ));
    }
}
