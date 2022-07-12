<?php

namespace App\Http\Controllers\Site;
use App\Models\Address;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Province;
use App\Models\Category;
use App\Models\Ward;
use Auth;
use App\Models\District;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    //
    use DeleteModelTrait;
    private $address_list;
    private $user_address;
    public function __construct(User $user, Address $address_list, UserAddress $user_address)
    {
        $this->user = $user;
        $this->user_address= $user_address;
        $this->address_list= $address_list;
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

    public function getWard(Request $request)
    {
        $districtId=$request->post('districtId');
		$ward=DB::table('ward')->where('district_id',$districtId)->get();
        
		$html='<option value="">--Chọn--</option>';
		foreach($ward as $list){
			$html.='<option value="'.$list->id.'">'.$list->ward_name.'</option>';
		}
		return $html;
    }

    public function index(User $user, $id) {
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();

        $address_list = Address::all();

        $user_address = User::where('id', $id)->with('address_list')->first();
        

        $provinceModel = new Province;
        $province_list = $provinceModel->orderBy('province_name','asc')->get();

        $district = new District();
        $ward = new Ward(); 
        $user = $this->user->find($id);
        return view('site.user.address.index', compact('categoryLimit','user','address_list', 'provinceModel','province_list','district', 'ward', 'user_address'));
    }

    public function insertAddress(Request $request, $id) {

        $dataAddressNewInsert = [
            'other_name' =>$request->other_name,
            'other_phone' =>$request->other_phone,
            'other_province_id' => $request->other_province_id,
            'other_district_id' => $request -> other_district_id,
            'other_ward_id' =>$request->other_ward_id,
            'other_address_id'=> $request->other_address_detail,
           
        ];
        $address_list = $this->address_list->create($dataAddressNewInsert);

        $list_address = [];
        array_push($list_address, (int)$id);
        $address_list->user()->sync($list_address);
       
       return redirect()->back()->with('message', 'Thêm địa chỉ thành công');
    }
    public function editAddress(Request $request, $id) {

        $address_user = $this->address_user->find($id);

        
        return view('site.user.address.editAddress', compact('address_user'));
    }
    public function deleteAddress($id) {
        return $this->deleteModelTrait($id, $this->user_address);
    }
}
