<?php

namespace App\Models;

use Carbon\Carbon;

class Receipient extends BaseModel
{
    protected $primaryKey = 'receipient_id';

    const UPDATED_AT = null;

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'street',
        'country',
        'city',
        'email_address',
        'phone_number',
        'postal_code',
        'status',
    ];

/*    public function save(array $options = [])
    {
        $this->created_at = Carbon::now()->toDateTimeString();
        $this->created_by = auth(app('VoyagerGuard'))->id();
        return parent::save($options);
    }*/
}
