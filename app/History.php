<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class History extends Model
{
    protected $fillable=['quantity','command_at','price','status','name','customer','product_id','customer_id'];
    protected $dates=['command_at'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function totalLine()
    {
        return $this->quantity*$this->price;
    }
    public function scopeTotalOrder($query){
        $result=$query->groupBy('command_at')->selectRaw('command_at,sum(quantity*price) as totalorder')->get();
        $arraytotalorder=array();
        foreach($result as $line){
            $date= strval($line->command_at);
            $arraytotalorder[$date]=$line->totalorder;
        }
        return $arraytotalorder;
    }

}

