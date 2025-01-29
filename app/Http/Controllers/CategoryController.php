<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CategoryController;
use App\Models\BannerAdvertisement;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Category(Category $category) {
            $categories = Category::all();
            $bannerads = BannerAdvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->first();

            return view('front.category', compact('category', 'categories', 'bannerads'));
    }
}
