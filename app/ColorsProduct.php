<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorsProduct extends Model
{
    public function get_product() {
        return $this->belongsToMany('App\Product');
    }
}
