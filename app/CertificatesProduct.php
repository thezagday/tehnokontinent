<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificatesProduct extends Model
{
    protected $fillable = ['title','img_path','prev'];
    public function get_product() {
        return $this->belongsTo('App\Product');
    }
}
