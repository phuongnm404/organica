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
use App\Models\Category;
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
        $category = Category::where('parent_id', 0)->get();
        $province_list = $provinceModel->orderBy('province_name','asc')->get();
        return view('register1', compact('province_list', 'category'));
    }

    protected function postRegister(Request $request)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
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
