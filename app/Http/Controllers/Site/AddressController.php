<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    //
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
}
