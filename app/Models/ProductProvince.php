<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProvince extends Model
{
    //
    protected $guarded = [];

    public function getProvincebyId($id) {
        return $this->find($id);
    }
}
