<?php


namespace App\Models;


use App\Helpers\SecurityUtil;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;

class Collection extends BaseModel
{
    protected $primaryKey = 'collection_id';
    public $timestamps = false;

    public function getTitleAttribute($text){
        return $this->{'title_'.App::getLocale()};
    }

    public function getEncryptedIdAttribute(){
        return SecurityUtil::encryptId($this->collection_id);
    }

    public function childCollections(){
        //return $this->belongsToMany(Collection::class, Collection::class,'parent_id','collection_id');
        return $this->hasMany(Collection::class,'parent_id',Collection::KeyName());
    }
}
