<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class Product extends BaseModel
{
    protected $primaryKey = 'product_id';

    public function save(array $options = [])
    {
        $this->created_at = Carbon::now()->toDateTimeString();
        $this->created_by = auth(app('VoyagerGuard'))->id();
        return parent::save($options);
    }

    public function getTitleAttribute($value){
        return App::getLocale() == 'ar'?$this->title_ar:$this->title_en;
    }
    public function getDescriptionAttribute($value){
        return App::getLocale() == 'ar'?$this->description_ar:$this->description_en;
    }

    public function categories(){
        return $this->belongsToMany(Category::class,ProductCategory::TableName(),Product::KeyName(),'category_id', '','category_id' );
            //->where('characteristic_key',CommonValues::CHARACTERISTIC_AMENITIES);
        //return $this->belongsToMany(Category::class,'categories','category_id','product_id','p','','')
    }
    public function collections(){
        return $this->belongsToMany(Collection::class,ProductCollection::TableName(),Product::KeyName(),'collection_id', '','collection_id' );
        //->where('characteristic_key',CommonValues::CHARACTERISTIC_AMENITIES);
        //return $this->belongsToMany(Category::class,'categories','category_id','product_id','p','','')
    }
}
