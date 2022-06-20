<?php

namespace App\Http\Controllers\Site;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\ProductTag;
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

     
        $productModel = new Product();

        $categoryModel = new Category();
        $brand = Brand::all();

        $tag = Tag::all();

        return view('site.product.productAll', compact('productAll', 'categorys', 'categoryLimit', 'productModel', 'categoryModel', 'brand', 'tag'));
    }
   
    public function getProductCategory($slugCategory, $categorysId) {

        $categorys = Category::where('parent_id', 0)->get();

        $categoryModel = new Category();

        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();

        $category_slug = $categoryModel->getCategoryType($slugCategory);

        $productModel = new Product();
       
        $brand = Brand::all();
        $tag = Tag::all();
        $products = Product::where('category_id', $categorysId)->paginate(12); 
       

        return view('site.product.productCategory', compact('categorys', 'categoryLimit', 'category_slug', 'products', 'productModel', 'brand', 'tag'));
    }

    public function getProductDetail($slugCategory,$slugProduct, $productId) {

        $categorys = Category::where('parent_id', 0)->get();
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();

        $categoryModel = new Category();
        $category_slug = $categoryModel->getCategoryType($slugCategory);

        $productModel = new Product();
        $product_slug = $productModel->getProductType($slugProduct);

        $products = Product::where('id', $productId)->with('tags')->first();

        $productBrand = new Brand();
        $productTag = new ProductTag();
      
        $brand = Brand::all();
       
        return view('site.product.productDetail', compact('categorys', 'categoryLimit', 'product_slug', 'products', 'productBrand', 'categoryModel', 'brand'));
    }
    public function filterBrand($brandId) {

        $categorys = Category::where('parent_id', 0)->get();
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $categoryModel = new Category();
        $productModel = new Product();
       
        $brand = Brand::all();
        $productBrand = Product::where('brand_id',$brandId )->paginate(12);
        $products = Product::where('id', $productId)->with('tags')->first();



        return view('site.product.productFilter', compact('categorys', 'categoryLimit', 'categoryModel','brand', 'productBrand', 'products'));
    }


}
