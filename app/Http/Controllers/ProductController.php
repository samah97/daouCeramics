<?php

namespace App\Http\Controllers;

use App\CommonValues;
use App\Helpers\CustomLog;
use App\Helpers\SecurityUtil;
use App\Helpers\URLUtil;
use App\Http\Requests\CartRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\CollectionRepository;
use App\Repositories\OrderItemRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductCollectionRepository;
use App\Repositories\ProductRepository;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Cookie;

class ProductController extends BaseController
{
    private $productRepository;
    private $categoryRepository;
    private $productCategoryRepository;
    private $productCollectionRepository;
    private $orderItemRepository;
    private $collectionRepository;


    /**
     * ProductController constructor.
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     * @param ProductCategoryRepository $productCategoryRepository
     * @param ProductCollectionRepository $productCollectionRepository
     * @param OrderItemRepository $orderItemRepository
     * @param CollectionRepository $collectionRepository
     */
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository, ProductCategoryRepository $productCategoryRepository, ProductCollectionRepository $productCollectionRepository,
                                OrderItemRepository $orderItemRepository, CollectionRepository $collectionRepository )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->productCollectionRepository = $productCollectionRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->collectionRepository = $collectionRepository;
        parent::__construct();

    }

    public function index(Request $request){
        $collectionId =0;
        $categoryId=0;
        $collectionFilter =null;
        $categoryFilter=null;
        $removeFilter = $request->has('rm')?$request->get('rm'):null;
        $removeCategory = 0;
        $removeCollection = 0;

        if($removeFilter!=null){
            $splitted = explode('-',$removeFilter);
            if(count($splitted) > 1){
                if($splitted[0] == 'co'){
                    $removeCollection = SecurityUtil::decryptId($splitted[1]);
                }else if($splitted[0] == 'c'){
                    $removeCategory = SecurityUtil::decryptId($splitted[1]);
                }
            }
        }
        if($request->has('collection')){
            $collectionId = SecurityUtil::decryptId($request->get('collection'));
            if($removeCollection != $collectionId ){
                $collectionFilter = $this->collectionRepository->getById($collectionId);
            }else{
                $collectionId = 0;
            }
        }
        if($request->has('category')){
            $categoryId = SecurityUtil::decryptId($request->get('category'));
            if($removeCategory != $categoryId ){
                $categoryFilter = $this->categoryRepository->getById($categoryId);
            }else{
                $categoryId = 0;
            }
        }
        //$collection = $request->has('collection')?SecurityUtil::decryptId($request->get('collection')):'';
        //$category = $request->has('category')?SecurityUtil::decryptId($request->get('category')):'';
        $data = [
            'collection'=>$collectionId,
            'category'=>$categoryId
        ];
        $products = $this->productRepository->filterProduct($data);
        $categories = $this->categoryRepository->all();


        return view('products',compact('products','categories','categoryFilter','collectionFilter'));
    }

    public function show($id,Request $request){

        $product = $this->productRepository->getActiveById($id);
        $productImages = $product->slider_images != null?json_decode($product->slider_images):array();
        if($product == null){

        }
        $orderItem = null;
        $totalPrice = $product->price;
        $quantity = 1;
        if($request->cookie(SecurityUtil::ORDER_COOKIE_KEY) != null){
            $orderId = (int)SecurityUtil::decrypt($request->cookie(SecurityUtil::ORDER_COOKIE_KEY));
            $orderItem = $this->orderItemRepository->where('product_id',$id)->where('order_id',$orderId)->get()->first();
            if($orderItem != null){
                $quantity = $orderItem->quantity;
                $totalPrice = $orderItem->total_price;
            }

        }

        $relatedProducts = $this->productCollectionRepository->relatedProducts($product);

        //$relatedCategory = $this->productRepository->filterProduct(['category'=>])
        //$relatedCategory = $this->productRepository->getByCategory($product->category_id,CommonValues::STATUS_ACTIVE);
        return view('show-product',compact('product','productImages','relatedProducts','orderItem','totalPrice','quantity'));
    }


}
