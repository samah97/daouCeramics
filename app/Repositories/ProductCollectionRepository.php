<?php

namespace App\Repositories;

use App\Models\ProductCollection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ProductCollectionRepository.
 */
class ProductCollectionRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return ProductCollection::class;
    }
}
