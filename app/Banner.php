<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
   * Связанная с моделью таблица.
   *
   * @var string
   */
  protected $table = 'banner';
  protected $fillable = ['img_path', 'title', 'body'];
  
}