<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DescriptionsProduct extends Model
{
    protected $fillable = ['title','body','img_path'];
    public function get_product() {
        return $this->belongsTo('App\Product');
    }
}
