<?php

namespace App\Models;

use Carbon\Carbon;

class Order extends BaseModel
{
    protected $primaryKey = 'order_id';

    public $timestamps =false;

    protected $fillable = [
        'receipient_id',
        'tracking_nbr',
        'payment_method',
        'status',
        'voucher_code',
        'order_datetime',
    ];
}
