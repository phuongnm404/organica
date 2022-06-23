<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    //
    protected $table = "ward";

    public function getWard($id)
    {
        return $this::where('district_id', $this::find($id)->district_id)->get();
    }

    public function getWardName($id)
    {
        return $this::find($id)->ward_name;
    }
}
