<?php

namespace App\Repositories;

use App\CommonValues;
use App\Models\Product;
use App\Models\ProductCollection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{

    private $productCollectionRepository;
    private $productCategoryRepository;

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Product::class;
    }


    public function __construct(ProductCollectionRepository $productCollectionRepository,ProductCategoryRepository $productCategoryRepository)
    {
        $this->makeModel();
        $this->productCollectionRepository = $productCollectionRepository;
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function getActiveById($id){
        return $this->where(
            [Product::KeyName()=>$id],
            ['status'=>CommonValues::STATUS_ACTIVE]
        )->first();
    }

    public function getByCategory($categoryId, $status){
        return $this->where(
            ['category_id'=>$categoryId],
            ['status'=>$status]
        )->get();
    }

    public function filterProduct($data = array()){
        $this->makeModel();
        $products = $this->where('status',CommonValues::STATUS_ACTIVE);

        if(array_key_exists('collection',$data) && $data['collection'] != ''){
            $products->whereIn('product_id',
                $this->productCollectionRepository->where('collection_id',$data['collection'])->get(['product_id'])->toArray()
            );
        }
        if(array_key_exists('category',$data) && $data['category'] != ''){
            $products->whereIn('product_id',
                $this->productCategoryRepository->where('category_id',$data['category'])->get(['product_id'])->toArray()
            );
        }

        return $products->get();
    }
}
