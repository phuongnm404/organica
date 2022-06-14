<?php

namespace App\Http\Controllers\Site;
use App\Models\SLider;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index() {

        $sliders = Slider::take(3)->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(12)->get();      //lấy sản phẩm mới nhất
        $productRecommends = Product::latest('view')->take(6)->get();   //lấy sản phẩm theo view
        return view('site.home.home', compact('sliders', 'categorys', 'products', 'productRecommends'));
    }

}
