<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Province;
use App\Models\Category;
use App\Models\Ward;
use App\Models\Address; 
use App\Models\Product;
use App\Models\District;
use App\Http\Controllers\Controller;
use Cart;
use Response;
class CartController extends Controller
{
    //
    private $address;
    public function __construct(User $user, Address $address)
    {
        $this->user = $user;
        $this->address= $address;
    }
    public function index() {
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::latest()->take(6)->get();  
        $carts = session()->get('cart');

        $id = auth()->user()->id;
        $address_list = Address::all();
        $user_address = User::where('id', $id)->with('address')->first();
        $provinceModel = new Province;
        $province_list = $provinceModel->orderBy('province_name','asc')->get();

        $district = new District();
        $ward = new Ward(); 
        $user = $this->user->find($id);

        return view('site.user.cart.index', compact('categoryLimit', 'carts', 'products','user','address_list', 'provinceModel','province_list','district', 'ward', 'user_address'));
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

    

       
    }
  
    public function saveCart(Request $request) {
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::latest()->take(6)->get(); 

        $productId = $request->productIdHidden;
        $quantity = $request->quantity;

        $product_infor = Product::where('id', $productId) -> first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
       // Cart::destroy();

        $data['id'] = $product_infor->id;
        $data['qty'] = $quantity;

        $data['name'] = $product_infor->name;
        $data['weight'] = $product_infor->price;
        
        if(isset($product_infor->sale_price)) {
            $data['price'] = $product_infor->sale_price;    
        } else {
            $data['price'] = $product_infor->price; 
        }
    
        $data['options']['image'] = $product_infor->feature_image_path;
      

        //dd($data);
        Cart:: add($data);
    
         return redirect()->back()->with('message','Thêm vào giỏ hàng thành công');
        
    }   

    public function showCart() {
        
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::latest()->take(6)->get();  

        $id = auth()->user()->id;
        $user = $this->user->find($id);

        $address_list = Address::all();

        $user_address = User::where('id', $id)->with('address')->first();
        $provinceModel = new Province;
        $province_list = $provinceModel->orderBy('province_name','asc')->get();

        $district = new District();
        $ward = new Ward(); 

        return view('site.user.cart.index', compact('categoryLimit', 'products', 'user','address_list', 'provinceModel','province_list','district', 'ward', 'user_address'));

    }
    public function deleteCart($rowId) {

        Cart::remove($rowId);
        return redirect('/user/cart/show-cart')->with('message','Xóa sản phẩm thành công');
    }
    public function updateQty(Request $request, $rowId) {
       
        $qty = $request->cart_quantity;
    
        Cart::update($rowId, $qty);

        return redirect('/user/cart/show-cart')->with('message','Bạn đã cập nhật số lượng sản phẩm');
    }
    
}
