<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    //
    protected $guarded = [];

    public function getAddressbyId($id) {
        return $this->find($id);
    }
}
