<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{

    protected $fillable=['name','category_id','abstract','quantity','price','slug','status','content','published_at'];
    protected $dates=['published_at'];

    public function picture(){
        return $this->hasOne('App\Picture');
    }

    public function tags()
    {
        return $this ->belongsToMany('App\Tag');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function history(){
        return $this->hasMany('App\History');
    }

    public function getNameAttribute($value){
        return ucfirst($value);
    }

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = (empty($value)) ? '0000-00-00 00:00:00' : Carbon::now('Europe/Paris');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = (empty($value)) ? str_slug($this->name) : str_slug($value);
    }

    public function hasTag($tagId){

        foreach($this->tags as $tag)
        {
            if($tag->id==$tagId) return true;
        }
        return false;
    }
    public function setCategoryIdAttribute($value)
    {
        $this->attributes['category_id'] = ($value == 0) ? null : $value;
    }

    public function scopeOnline($query){

        return $query->where('status','=','opened')->orderBy('published_at');
    }

}
