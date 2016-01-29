<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['name']; // pour pouvoir creer un tag avec tinker create il faut le preciser

    public function products(){
        return $this->belongsToMany('App\Product');
    }

}