<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 *
 * @package App\Model
 * @author Samah Daou
 * @mixin Eloquent
 * @mixin Builder
 * @mixin \Illuminate\Database\Query\Builder
 * @method static Builder|BaseModel newModelQuery()
 * @method static Builder|BaseModel newQuery()
 * @method static Builder|BaseModel query()
 */
class BaseModel extends Model
{
    static $COUNT = 2;

    public static function TableName()
    {
        return with(new static)->getTable();
    }

    public static function KeyName()
    {
        return (new static)->getKeyName();
    }

    public static function concatTableId()
    {
        return with(new static)->getTable() . "." . (new static)->getKeyName();
    }
}

