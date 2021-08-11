<?php

namespace App\Models;

class OrderItem extends BaseModel
{
    protected $table = 'order_item';
    protected $primaryKey = 'order_item_id';
    public $timestamps =false;

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
    ];

    public function product(){
        return $this->belongsTo(Product::class,Product::KeyName());
    }

    public function getTotalPriceAttribute(){
        return $this->price * $this->quantity;
    }
}
