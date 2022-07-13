<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Cart;
use Response;
class CartController extends Controller
{
    //
    public function index() {
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::latest()->take(6)->get();  
        $carts = session()->get('cart');

        return view('site.user.cart.index', compact('categoryLimit', 'carts', 'products'));
    }

    public function addToCart($id) {
        $product = Product::find($id);

        $cart = session()->get('cart');

        if(isset($cart[$id])){

            $cart[$id]['quantity'] = $cart[$id]['quantity'] +1;

        }
        else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'weight'=> $product->weight,
                'feature_image_path'=>$product->feature_image_path,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);

        return response()->json([
            'code' =>200,
            'message'=> 'success'
        ],200);

       
    }
    public function updateCart(Request $request) {

        dd($request->all());

        // if($request->id && $request->quantity) {
        //     $carts = session()->get('cart');
        //     $carts[$request->id]['quantity'] = $request->quantity;

        //     session()->put('cart', $carts);
        //     $carts = session()->get('cart');

        //     $cartComponent = view('site.user.cart.components.cart_component', compact('carts'))->render();
        //     return reponse()->json(['cart_component' => $cartComponent, 'code'=>200],200 );
        // }
    }
    // public function deleteCart(Request $request) {
    //     if($request->id) {

    //         $carts = session()->get('cart');

    //         unset($carts[$request->id]);

    //         session()->put('cart', $carts);

    //         $carts = session()->get('cart');
    //         $cartComponent = view('site.user.cart.components.cart_component', compact('carts'))->render();
    //         return reponse()->json(['cart_component' => $cartComponent, 'code'=>200 ],200 );
    //     }
    // }
    public function saveCart(Request $request) {
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::latest()->take(6)->get(); 

        $productId = $request->productIdHidden;
        $quantity = $request->quantity;

        $product_infor = Product::where('id', $productId) -> first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy();

        $data['id'] = $product_infor->id;
        $data['qty'] = $quantity;

        $data['name'] = $product_infor->name;
        $data['weight'] = $product_infor->price;
        
        $data['price'] = $product_infor->price;
        $data['options']['image'] = $product_infor->feature_image_path;

        Cart:: add($data);
    
         return redirect()->back()->with('message','Thêm vào giỏ hàng thành công');
        
    }   

    public function showCart() {
        
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::latest()->take(6)->get(); 
        return view('site.user.cart.index', compact('categoryLimit', 'products'));

    }
    public function deleteCart($rowId) {

        Cart::remove($rowId);

        return redirect('/user/cart/show-cart')->with('message','Xóa sản phẩm thành công');
    }
    
}
