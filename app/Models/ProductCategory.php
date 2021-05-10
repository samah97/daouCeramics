<?php

namespace App\Models;

class ProductCategory extends BaseModel
{
    protected $primaryKey = 'product_category_id';
    public $timestamps = false;
    protected $table = 'product_category';
}
