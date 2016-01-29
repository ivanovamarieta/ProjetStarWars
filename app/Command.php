<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable=['id','name','product_id','user_id', '_token', 'price','quantity', 'status', 'uri'];

    public function product(){
        return $this->belongsTo('App\Product');
    }

}
