<?php


namespace App\Models;


use Illuminate\Support\Facades\App;

class Newsletter extends BaseModel
{
    protected $primaryKey = 'newsletter_id';
    public $timestamps = false;
    const UPDATED_AT = null;

    protected $fillable = [
        'email',
        'status',
        'created_at'
    ];
}
