<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $fillable = ['title','body','price','img_path'];
    public function get_product() {
        return $this->belongsTo('App\Product');
    }
}
