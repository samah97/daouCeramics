<?php

namespace App\Models;

class OrderItem extends BaseModel
{
    protected $table = 'order_item';
    protected $primaryKey = 'order_id';
    public $timestamps =false;

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
    ];
}
