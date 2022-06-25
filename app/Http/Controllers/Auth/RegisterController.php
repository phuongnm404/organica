<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\User;
use App\Models\StaticFeature;
use Illuminate\Support\Facades\DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $user;
    public function __construct(User $user)
    {
        $this->middleware('guest');
        $this->user = $user;
    }
    public function index() {
        $provinceModel = new Province;
        $static = StaticFeature::all();
        $province_list = $provinceModel->orderBy('province_name','asc')->get();
        return view('register', compact('province_list', 'static'));
    }

    protected function postRegister(Request $request)
     { 
//  dd($request->birthday);
            $dataUserCreate = [
                'name' =>$request->name,
                'gender' =>$request->gender,
                'birthday' =>  date('Y-m-d H:i:s' , strtotime($request->birthday)),
                'phone' => $request ->phone,
                'email' =>$request->email,
                'password' =>Hash::make($request->password),
                'province_id'=>$request->province_id,
                'district_id'=> $request->district_id,
                'ward_id'=> $request->ward_id,
                'address'=> $request->address, 
                'role'=>1,
            ];
            $user = $this->user->create($dataUserCreate);
    

            $list_feature = $request->static_feature;
            $user->static_feature()->sync($list_feature);

           
          
            return redirect()->route('home.index') ->with('status', 'Bạn đã tạo tài khoản thành công , mời bạn đăng nhập');
      

        }
        
    




    public function getDistrict(Request $request)
    {
        $provinceId=$request->post('provinceId');
		$district=DB::table('district')->where('province_id',$provinceId)->get();
        $html='<option value="">--Chọn--</option>';
		foreach($district as $list){
			$html.='<option value="'.$list->id.'">'.$list->district_name.'</option>';
		}
        return $html;
    }
    public function getWard(Request $request){
		$districtId=$request->post('districtId');
		$ward=DB::table('ward')->where('district_id',$districtId)->get();
        print_r($ward);
		$html='<option value="">--Chọn--</option>';
		foreach($ward as $list){
			$html.='<option value="'.$list->id.'">'.$list->ward_name.'</option>';
		}
		return $html;
	}
 
}
