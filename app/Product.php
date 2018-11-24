<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];
    public function category()
    {
      return $this->belongsTo(Category::class);//secara default akan mencari ID, jika berbeda harus di definisaikan terlebih dahulu
    }
}
