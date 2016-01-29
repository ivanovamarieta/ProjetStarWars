<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
  protected $fillable=['product_id','size','uri','type','title'];

    public function product(){

        return $this->belongsTo('App\Product');
    }
}
