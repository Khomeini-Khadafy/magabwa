<?php
namespace App\Http\Controllers;

use App\Http\Controllers\DetailsController;
use App\Models\ArticleNews;
use App\Models\BannerAdvertisement;
use App\Models\Category;

class DetailsController extends Controller
{
    public function details(ArticleNews $articleNews)
    {
        $categories = Category::all();
        $articles   = ArticleNews::with(['category'])
            ->where('is_featured', 'not_featured')
            ->where('id', '!=', $articleNews->id)
            ->latest()
            ->take(3)
            ->get();

        $bannerads = BannerAdvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->first();
        
        $author_news = ArticleNews::where('author_id', $articleNews->author_id)
            ->where('id', '!=', $articleNews->id)
            ->inRandomOrder()
            ->get();

        $square_ads = BannerAdvertisement::where('is_active', 'active')
            ->where('type', 'square')
            ->take(2)
            ->inRandomOrder()
            ->get();

        if ($square_ads->count() < 2) {
            $square_ads_1 = $square_ads->first();
            $square_ads_2 = $square_ads->first();
            // $square_ads_2 = null;
        } else {
            $square_ads_1 = $square_ads->get(0);
            $square_ads_2 = $square_ads->get(1);
        }

        return view('front.details', 
        compact(
            'articleNews',
             'bannerads', 
             'categories', 
             'articles', 
             'square_ads_1', 
             'square_ads_2', 
             'author_news'
            ));
    }
}
