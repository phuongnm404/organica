<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name', 'parent_id', 'slug',
    ];
}
