<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    
    protected $fillable = ['name','last_name','cin','mail','adress','function','commercial_id'];
    
    public function testDriveHour(){
        return $this->hasMany('App\TestDriveHour');
    }
}
