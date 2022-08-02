<?php

namespace App\Http\Controllers\Site;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;


class HomeController extends Controller
{
    public function index(Request $request) {
        $sliders = Slider::take(3)->get();
        $categorys = Category::where('parent_id', 0)->get();

        $query = Product::query();
        
        if ($request->ajax()) {
            $a = Menu::find($request->province_id);
            $products= $a->products()->with('category')->get();
            return response()->json(['products'=>$products]);
        }
        $products = $query->get();

        
        $productDiscount1 = Product::with(['province'])->where('sale_price', '>', 0);
        $productDiscount=$productDiscount1->take(6)->get();

        
        $productRecommends = Product::latest('view')->take(6)->get();   //lấy sản phẩm theo view

        $productView = Product::latest('view')->take(12)->get();

        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        //dd($productDiscount);

        $menu = Menu::all();

        return view('site.home.home', compact('sliders', 'categorys', 'products', 'productRecommends', 'categoryLimit', 'productDiscount', 'productView', 'menu'));
    }


}
