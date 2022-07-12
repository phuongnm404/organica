<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = "address_list";
    protected $guarded = [];

    public function user() {
        return $this -> belongsToMany(User::class, 'user_address');
    }
}   
