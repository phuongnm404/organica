<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticFeature extends Model
{
    //
    protected $guarded = [];

    public function user() {
        return $this -> belongsToMany(User::class, 'user_static_feature', 'user_id', 'static_id');
    }
}
