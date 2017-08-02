<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogs extends Model
{
    protected $table = 'catalogs';
    protected $fillable = ['title','parent','default_img'];

    public function get_childrens() {
        return $this->hasMany('App\Catalogs','parent');
    }
    
    public function get_parent() {
        return $this->belongsTo('App\Catalogs','parent');
    }
}
