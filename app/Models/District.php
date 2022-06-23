<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table = "district";

    public function getDistrict($id)
    {
        return $this::where('province_id', $this::find($id)->province_id)->get();
    }

    public function getDistrictName($id)
    {
        return $this::find($id)->district_name;
    }
}
