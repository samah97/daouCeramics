<?php

namespace App\Models;

class ProductCollection extends BaseModel
{
    protected $primaryKey = 'product_collection_id';
    public $timestamps = false;
    protected $table = 'product_collection';

    public function product(){
        return $this->belongsTo(Product::class,Product::KeyName());
    }
}
