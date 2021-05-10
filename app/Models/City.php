<?php

namespace App\Models;

class City extends BaseModel
{
    protected $primaryKey = 'city_id';
    public $timestamps = false;

    public function country(){
        return $this->belongsTo(Country::class,'country_code','code');
    }
}
