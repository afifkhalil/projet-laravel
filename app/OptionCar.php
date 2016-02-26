<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionCar extends Model
{   
     protected $fillable = ['id_car','id_option','option_price'];
    
     
     public function options(){
        return $this->belongsToMany('App\Option');
    }
    
    public function cars(){
        return $this->belongsToMany('App\Car');
    }
}
