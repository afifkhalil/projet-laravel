<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['model','picture','video','basic_price'];
    
    public function optioncars(){
        return $this->hasMany('App\OptionCar');
    }
}
