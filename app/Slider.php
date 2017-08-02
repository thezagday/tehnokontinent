<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /**
   * Связанная с моделью таблица.
   *
   * @var string
   */
  protected $table = 'slider';
  protected $fillable = ['img_path','title','body','price','share'];  
}