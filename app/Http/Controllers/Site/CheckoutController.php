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
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use Cart;


class CheckoutController extends Controller
{
    //
    private $address;
    private $user_address;
    public function __construct(User $user, Address $address)
    {
        $this->user = $user;
        $this->address= $address;
    }

    public function index() {
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::latest()->take(6)->get();  

        $id = Auth::user()->id;

        $address_list = Address::all();
        $user_address = User::where('id', $id)->with('address')->first();
        $provinceModel = new Province;
        $province_list = $provinceModel->orderBy('province_name','asc')->get();

        $district = new District();
        $ward = new Ward(); 
        $user = $this->user->find($id);

        $address_default = Address::where('user_id', $id )->where('default', 1)->get();
      

        return view('site.user.checkout.index', compact('categoryLimit', 'products','user','address_list', 'provinceModel','province_list','district', 'ward', 'user_address', 'address_default'));
    }
    public function checkout(Request $request, $id) {
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::latest()->take(6)->get(); 

        $user_id = auth()->user()->id;
        $user = $this->user->find($user_id);

        $address_list = Address::all();
        $address = Address::find($id);
       
        
        $user_address = User::where('id', $user_id)->with('address')->first();

        $provinceModel = new Province;
        $province_list = $provinceModel->orderBy('province_name','asc')->get();
        $province_name =  $provinceModel->getProvinceName($address->province_id);
        $district = new District();
        $district_name = $district->getDistrictName($address->district_id);
        $ward = new Ward(); 
        $ward_name = $ward->getWardName($address->ward_id);

        $address_detail = $address->address_detail.', '.$ward_name.', '.$district_name.', '.$province_name ;
      

        $address_default = Address::where('user_id', $user_id)->where('default', 1)->get();
        
        $cart = Cart::content();
       
      

        $bill = new Bill();
        $bill->user_id = Auth::user()->id;
        $bill->order_username = $address->name ;
        $bill->order_phone =  $address->phone ;
        $bill->order_address =  $address_detail;
        $bill->order_note = $request->note;
        $bill->order_status = $request->status;
        $bill->method_delivery = $request->delivery;
        $bill->total_price = Cart::subtotal();
        $bill->save();
    
        Cart::destroy(); // xóa sản phẩm trong đơn hàng cũ

        foreach ($cart as $value)  {
            $bill_detail = new BillDetail();
            $bill_detail->cart_id = $bill->id;
            $bill_detail->product_id = $value->id;
            $bill_detail->quantity = $value->qty;
            $bill_detail->price =$value->price * $value->qty;
            $bill_detail->img =$value->options->image;
            $bill_detail->save();
        }
       
        

        return redirect('/user/order/index/')->with("success", "Mua hàng thành công! Vui lòng chờ xác nhận của chúng tôi.");
    }
}
