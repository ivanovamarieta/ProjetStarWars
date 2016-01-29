<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=['id','name','product_id','user_id', '_token', 'price','quantity', 'status', 'uri'];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
