<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=['name','customer'];

    public function user()
   {
       return $this->belongsTo('App\User');
   }

   public function history()
   {
        return $this->hasMany('App\History');
   }
}
