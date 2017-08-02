<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructionsProduct extends Model
{
    public function get_product() {
        return $this->belongsTo('App\Product');
    }
}
