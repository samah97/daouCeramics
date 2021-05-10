<?php

namespace App\Http\Controllers;

use App\CommonValues;
use App\Helpers\CustomLog;
use App\Helpers\SecurityUtil;
use App\Http\Requests\CartRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class ProductController extends BaseController
{
    private $productRepository;
    private $categoryRepository;
    private $productCategoryRepository;
    private $orderRepository;

    public function __construct(ProductRepository $productRepository,CategoryRepository $categoryRepository,ProductCategoryRepository $productCategoryRepository, OrderRepository $orderRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->orderRepository = $orderRepository;
        parent::__construct();
    }

    public function index(Request $request){

        $collection = $request->has('collection')?SecurityUtil::decryptId($request->get('collection')):'';
        $category = $request->has('category')?SecurityUtil::decryptId($request->get('category')):'';
        $data = [
            'collection'=>$collection,
            'category'=>$category
        ];
        $products = $this->productRepository->filterProduct($data);

        $categories = $this->categoryRepository->all();

        return view('products',compact('products','categories'));
    }

    public function show($id){

        $product = $this->productRepository->getActiveById($id);
        $productImages = $product->slider_images != null?json_decode($product->slider_images):array();
        if($product == null){

        }

        $relatedCategory = $this->productCategoryRepository->relatedProducts($product);

        //$relatedCategory = $this->productRepository->filterProduct(['category'=>])
        //$relatedCategory = $this->productRepository->getByCategory($product->category_id,CommonValues::STATUS_ACTIVE);
        return view('show-product',compact('product','productImages'));
    }

    public function submit($id, CartRequest $cartRequest){
        try{
            $product = $this->productRepository->getActiveById($id);
            if($product == null){

            }
            $data['quantity'] = $cartRequest->quantity;
            $data['product_id'] = $id;
            $data['price'] = ($product->price * $cartRequest->quantity);
            $orderId = $this->orderRepository->addToCart($data);
            
            if($orderId > 0){
                CustomLog::getInstance()->info("User successfully added product: (". $id.") to cart");
            }else{
                CustomLog::getInstance()->error("There was an error adding product to cart");
            }

            return redirect(route('products'));
        }catch (\Exception $exception){
            CustomLog::getInstance()->info("There was an error adding product to cart");
            CustomLog::getInstance()->error($exception);
        }
    }
}
