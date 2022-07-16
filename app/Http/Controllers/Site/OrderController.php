<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Province;
use App\Models\Category;
use App\Models\Ward;
use App\Models\Address; 
use App\Models\Product;
use App\Models\District;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;
use Auth;
use App\Models\Cart;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function index() {
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::latest()->take(6)->get(); 

        $user_id = Auth::user()->id;
        
        $bill = Bill::where('user_id', $user_id)->get();

        return view('site.user.order.index', compact('categoryLimit', 'products', 'bill'));
    }
    public function detail($id) {
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::latest()->take(6)->get(); 


        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        

        $billDetail = Bill::find($id);

    

        $orderDetail = new BillDetail();
        $orderDetailList = $orderDetail::join('products', 'products.id', 'order_detail.product_id')
                        ->select('order_detail.*', 'products.name')
                        ->where('cart_id', '=', $id)
                        ->get();

       
        return view('site.user.order.detail', compact('categoryLimit', 'products', 'billDetail','user', 'orderDetailList'));
    }
}
