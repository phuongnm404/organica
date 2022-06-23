<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    //
    public function district(Request $request)
    {
        $huyen = new DistrictModel();
        $huyenList = $huyen::where('province_id', $request->provinceId)->get();

        $htmlOption = '';
        foreach($huyenList as $value) {
            $htmlOption .= "<option value='".$value->id."'>".$value->district_name."</option>";
        }

        return $htmlOption;
    }

    public function ward(Request $request)
    {
        $phuong = new WardModel();
        $phuongList = $phuong::where('district_id', $request->districtId)->get();

        $htmlOption = '';
        foreach($phuongList as $value) {
            $htmlOption .= "<option value='".$value->id."'>".$value->ward_name."</option>";
        }

        return $htmlOption;
    }
}
