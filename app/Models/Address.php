<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = "address";
    protected $guarded = [];

    public function user() {
        return $this -> belongsToMany(User::class);
    }
    public function getProvinceName($id)
    {
        return $this::find($id)->province_name;
    }
}   
