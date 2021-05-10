<?php

namespace App\Repositories;

use App\Models\OrderItem;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class OrderItemRepository.
 */
class OrderItemRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return OrderItem::class;
    }

}
