<?php


namespace App\Models;


use App\Helpers\SecurityUtil;
use Illuminate\Support\Facades\App;

class Category extends BaseModel
{
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    public function getTitleAttribute($text){
        return $this->{'title_'.App::getLocale()};
    }

    public function getEncryptedIdAttribute(){
        return SecurityUtil::encryptId($this->category_id);
    }
}
