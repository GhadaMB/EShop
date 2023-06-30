<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index() {
        $featured_products = Product::where('trending','1')->take(10)->get();
        $trending_categories = Category::where('popular','1')->take(10)->get();
        return view('frontend.index', compact('featured_products', 'trending_categories'));
    }

    public function category() {

        $category = Category::where('status','0')->get();
        return view('frontend.category', compact('category'));
    }
}
