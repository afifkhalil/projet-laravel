<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestDriveDay extends Model
{
    //
     protected $fillable = ['date','car_id'];
    
    public function testDriveHour(){
        return $this->hasMany('App\TestDriveHour');
    }
}
