<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title','discount','is_new','width_full','width_useful','wave','height','price','default_img'];
    public function get_descriptions() {
        return $this->hasMany('App\DescriptionsProduct','parent');
    }
    
    public function get_instructions() {
        return $this->hasMany('App\InstructionsProduct','parent');
    }
    public function get_certificates() {
        return $this->hasMany('App\CertificatesProduct','parent');
    }
    
    
    
    /*  создает дополнительную таблицу products_colors_product
        и связывает Product с ColorsProduct по полям product_id и colors_product_id 
        для связи многие-ко-многим*/
    public function get_colors() {
        return $this->belongsToMany('App\ColorsProduct','products_colors_product');
        
    }
    public function get_accessories() {
        return $this->belongsToMany('App\Accessories','accessories_products');
    }
}
