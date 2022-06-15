<?php

namespace App\Http\Controllers\Site;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function index($slug, $categorysId) {
        $sliders = Slider::take(3)->get();
        $categorys = Category::where('parent_id', 0)->get();

        $products = Product::where('category_id', $categorysId)->paginate(12); 

        $categoryLimit = Category::where('parent_id', 0)->take(3)->get(); //lấy category-tab

     //   return view('site.product.index', compact('sliders', 'categorys', 'products', 'categoryLimit'));
    }
    public function getAll() {
        $categorys = Category::where('parent_id', 0)->get();
        $productAll = Product::all()->shuffle();
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        return view('site.product.productAll', compact('productAll', 'categorys', 'categoryLimit'));
    }

    public function getProduct($slug, $categorysId) {
        $categorys = Category::where('parent_id', 0)->get();

        $categoryModel = new Category();

        $category_slug = $categoryModel->getCategoryType($slug);

        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();

        $products = Product::where('category_id', $categorysId)->paginate(12); 

        return view('site.product.productCategory', compact('categorys', 'categoryLimit', 'category_slug', 'products'));
    }


}