<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\UserAddress;
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

        $id = auth()->user()->id;
        $address_list = Address::all();
        $user_address = User::where('id', $id)->with('address')->first();
        $provinceModel = new Province;
        $province_list = $provinceModel->orderBy('province_name','asc')->get();

        $district = new District();
        $ward = new Ward(); 
        $user = $this->user->find($id);

        return view('site.user.checkout.index', compact('categoryLimit', 'products','user','address_list', 'provinceModel','province_list','district', 'ward', 'user_address'));
    }
    public function checkout(Request $request, $id) {

       // dd( $request->delivery);
       // response()->json(dd($request->all()));
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

        $user_address_default = Address::()

        $address_detail = $address->address_detail.','.$ward_name.','.$province_name.','.$district_name ;
        // dd( $address_detail );

        $bill = new Bill();
        $bill->user_id = Auth::user()->id;
        $bill->order_username = $address->other_name ;
        $bill->order_phone =  $address->other_phone ;
        $bill->order_address =  $address_detail;
        $bill->order_note = $request->note;
        $bill->order_status = $request->status;
        $bill->method_delivery = $request->delivery;
        $bill->save();

    

        return view('site.user.checkout.checkout', compact('categoryLimit', 'products','address_list', 'user'));
    }
}
