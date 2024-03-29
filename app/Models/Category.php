<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name', 'parent_id', 'slug',
    ];
    protected $table = 'categories';

    public function categoryChildren() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'category_id');

    }
    
   public function getCategoryType($slug)
   {
      return $this::where('slug', $slug)->first();
   }
   
   public function getCategoryIdSlug($id) {
        return $this::find($id)->slug;
   }
}