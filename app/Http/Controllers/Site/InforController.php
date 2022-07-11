<?php

namespace App\Http\Controllers\Site;
use App\Models\User;
use App\Models\Province;
use App\Models\Ward;
use App\Models\District;
use App\Models\StaticFeature;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class InforController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index(User $user, $id) {
        $provinceModel = new Province;
        $static = StaticFeature::all();
        $province_list = $provinceModel->orderBy('province_name','asc')->get();

        $district = new District();
        $ward = new Ward(); 
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();

        
        $user = $this->user->find($id);

        return view('site.user.infor.index', compact('user','provinceModel', 'province_list','district', 'ward', 'static', 'categoryLimit'));
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

         
        // $userItem = $user::find($id);
        // $userItem->name = $request->name;
        // $userItem->phone = $request->phone;
        // $userItem->birthday =  date('Y-m-d H:i:s' , strtotime($request->birthday));
        // $userItem->gender = $request->gender;
        // $userItem->province_id = $request->province_id;
        // $userItem->district_id = $request->district_id;
        // $userItem->ward_id = $request->ward_id;
        // $userItem->address = $request->address;
        // $userItem->email = $request->email;
        // $userItem->save();
       
        
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
    public function updatePass() {
        
    }
}
