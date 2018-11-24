<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  //protected $fillable=('name') untuk mendefinisikan  field
    protected $guarded=[];//untuk mendefinisikan semua field yang fillable
    public function user()
    {
      return $this->belongsTo(user::class);//secara default akan mencari ID, jika berbeda harus di definisaikan terlebih dahulu
    }
}
