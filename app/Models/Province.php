<?php

namespace App\Models;

use App\Models\Address;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $table = "province";

    public function getProvinceName($id)
    {
        return $this::find($id)->province_name;
    }
    public function address() {
        return $this->belongTo(Address::class, 'province_id');
    }
}