<?php

namespace App\Http\Controllers\Site;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        $sliders = Slider::take(3)->get();
        $categorys = Category::where('parent_id', 0)->get();

        $products = Product::orderBy('view', 'desc')->take(12)->get();      //lấy sản phẩm nổi bật có nhiều view

        $productDiscount = Product::where('sale_price', '>', 0)->take(6)->get();  //lấy các sản phẩm đang khuyến mãi
        
        $productRecommends = Product::latest('view')->take(6)->get();   //lấy sản phẩm theo view
        
       // $productCategory = Product::where('category_id', '')
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();

        //dd($productDiscount);

        return view('site.home.home', compact('sliders', 'categorys', 'products', 'productRecommends', 'categoryLimit', 'productDiscount'));
    }

}
