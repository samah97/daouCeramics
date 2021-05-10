<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductCategory;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ProductCategoryRepository.
 */
class ProductCategoryRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return ProductCategory::class;
    }

    public function relatedProducts(Product $product){
        return $this->whereIn('category_id',$product->categories()->allRelatedIds());
    }
}
