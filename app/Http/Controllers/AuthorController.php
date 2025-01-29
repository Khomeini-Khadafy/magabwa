<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\BannerAdvertisement;
use App\Models\Category;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function Author(Author $author){
        $categories = Category::all();
        $bannerads = BannerAdvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->first();
        return view('front.author', compact('categories', 'author', 'bannerads'));
    }
}
