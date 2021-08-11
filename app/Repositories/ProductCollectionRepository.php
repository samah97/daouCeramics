<?php

namespace App\Repositories;

use App\Models\Product;
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

    public function relatedProducts(Product $product){
        return $this->whereIn('collection_id',$product->collections()->allRelatedIds())->where('product_id',$product->product_id,'<>')->limit(4)->get();
    }
}
