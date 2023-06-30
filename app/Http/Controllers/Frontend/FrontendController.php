<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    // Display Home Page
    public function index() {
        $featured_products = Product::where('trending','1')->take(10)->get();
        $trending_categories = Category::where('popular','1')->take(10)->get();
        return view('frontend.index', compact('featured_products', 'trending_categories'));
    }

    // Display All Categories page
    public function category() {

        $category = Category::where('status','0')->get();
        return view('frontend.category', compact('category'));
    }

    // Display Category page (Contains the Products of this Category)
    public function viewCategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status','0')->get();

            return view('frontend.products.index', compact('category','products'));
        } else {
            return redirect('/')->with('status', 'Category does not exist');
        }
    }
}
