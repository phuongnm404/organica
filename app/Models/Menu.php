<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Menu extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [];
    public function products() {
        return $this -> belongsToMany(Product::class, 'product_province');
    }
    public function getProvinceName($id) {
        return $this::find($id) ->name;
    }
}
