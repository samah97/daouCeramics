<?php

namespace App\Models;

class Country extends BaseModel
{
    protected $table = 'countries';

    protected $primaryKey = 'country_id';

    public $timestamps = false;

    public function cities(){
        return $this->hasMany(City::class,'country_code');
    }

/*    public function regions(){
        return $this->hasMany(Region::class,'country_code');
    }*/
}
