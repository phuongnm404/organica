<?php

namespace App\Http\Controllers\Site;
use App\Models\User;
use App\Models\Province;
use App\Models\Ward;
use App\Models\District;
use App\Models\StaticFeature;
use App\Models\Category;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class InforController extends Controller
{   
    
    public function __construct(User $user, Address $address)
    {
        $this->user = $user;
        $this->address= $address;
    }
    public function index(User $user, $id) {
      
        $static = StaticFeature::all();
        $provinceModel = new Province;
        $province_list = $provinceModel->orderBy('province_name','asc')->get();

        $district = new District();
        $ward = new Ward(); 
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $address = Address::orderBy('id', 'desc');
        
        $user = $this->user->find($id);
        $user_address = Address::where('user_id', $id)->where('default', 1)->get();
        //dd( $user_address[0]->province_id);

        $address_list = Address::all(); 
        return view('site.user.infor.index', compact('user','provinceModel', 'province_list','district', 'ward', 'static', 'categoryLimit', 'address_list', 'user_address'));
    }
    public function update(Request $request,$id) {
        
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:3',
            'address'=>'required|min:3',
            'email'=>'required|email',
        ],[
            'name.required'=>'Bạn chưa nhập họ và tên',
            'name.min'=>'Họ và tên phải có ít nhất 3 kí tự',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'address.min'=>'Địa chỉ phải có ít nhất 3 kí tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn nhập sai định dạng email',
        ]);
    
        if($validator->fails()){
            
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

       
        $user = new User();

        $this->user->find($id)->update([
                'name' =>$request->name,
                'gender' =>$request->gender,
                'birthday' =>  date('Y-m-d H:i:s' , strtotime($request->birthday)),
                'phone' => $request ->phone,
                'email' =>$request->email,
                'province_id'=>$request->province_id,
                'district_id'=> $request->district_id,
                'ward_id'=> $request->ward_id,
                'address'=> $request->address, 
        ]);
        $user = $user::find($id);
        
        return redirect('user/infor/'.$user->id)->with('message', 'Thay đổi thông tin cá nhân thành công!');

       
    }
    public function updatePass(Request $request) {

                // $user = User::findOrFail(Auth::user()->id);
                // $user-> password = $request->new_pass;
                // $user->save();
                // return redirect()->back()->with('message', 'Thay đổi mật khẩu thành công');

       if(Hash::check($request->old_pass, Auth::user()->password)) {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = $request->new_pass;
            $user->save();
            return redirect()->back()->with('message', 'Thay đổi mật khẩu thành công');
        }else {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không đúng');
        }

    }
   
    
}
