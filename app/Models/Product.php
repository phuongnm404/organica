<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [];
    protected $tables = 'products';
    public function images() {
        return $this -> hasMany(ProductImage::class, 'product_id');
    }
    public function tags() {
        return $this -> belongsToMany(Tag::class, 'product_tags');
    }
    public function province() {
        return $this -> belongsToMany(Menu::class, 'product_province','product_id','menu_id');
    }
    public function category() {
        return $this-> belongsTo(Category::class, 'category_id');
    }
    public function productImages() {
        return $this -> hasMany(ProductImage::class, 'product_id');
    }
    public function brands() {
        return $this-> hasOne(Brand::class, 'brand_id');
    }
    public function getProductType($slug)
    {
       return $this::where('slug', $slug)->first();
    }
    
   
}
