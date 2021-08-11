<?php


namespace App\Http\Controllers;


use App\Helpers\CustomLog;
use App\Helpers\SecurityUtil;
use App\Http\Requests\CartRequest;
use App\Http\Requests\DeleteCartRequest;
use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ReceipientRepository;
use Illuminate\Http\Request;

class AjaxController extends BaseController
{

    private $orderRepository;
    private $productRepository;
    private $orderItemRepository;
    /**
     * AjaxController constructor.
     * @param OrderRepository $orderRepository
     * @param ProductRepository $productRepository
     * @param OrderItemRepository $orderItemRepository
     */
    public function __construct(OrderRepository $orderRepository,ProductRepository $productRepository,OrderItemRepository $orderItemRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->orderItemRepository = $orderItemRepository;
    }


    public function updateCartItem(CartRequest $cartRequest){

        if($cartRequest->cookie(SecurityUtil::ORDER_COOKIE_KEY) != null) {
            $product = $this->productRepository->getActiveById($cartRequest->product_id);
            $orderId = $cartRequest->cookie(SecurityUtil::ORDER_COOKIE_KEY);

            if($product->quantity >= $cartRequest->quantity){

                $data['quantity'] = $cartRequest->quantity;
                $data['product_id'] = $cartRequest->product_id;
                $data['order_id'] = $orderId;

                $orderId = $this->orderRepository->addToCart($data);
                if($orderId > 0){
                    $total = $this->orderRepository->getOrderTotal($data);
                    return [
                        'result'=>true,
                        'product_id'=>$cartRequest->product_id,
                        'quantity'=>$cartRequest->quantity,
                        'total'=>$total
                    ];
                    CustomLog::getInstance()->info("User successfully updated product: (". $cartRequest->product_id.") quantity to ".$cartRequest->quantity);
                }else{
                    return ['result'=>false];
                    CustomLog::getInstance()->info("There was an error updating cart items for order= ".$orderId);
                }
            }else{
                return ['result'=>false];
                CustomLog::getInstance()->info("Cart Item not updated;;;quantity exceeds available quantity (".$orderId.")");
            }
        }else{
            return ['result'=>false];
            CustomLog::getInstance()->info("No order found");
        }
    }

    public function deleteCartItem(Request $request){

        if($request->cookie(SecurityUtil::ORDER_COOKIE_KEY) != null) {
            $product = $this->productRepository->getActiveById($request->product_id);
            $orderId = $request->cookie(SecurityUtil::ORDER_COOKIE_KEY);
            $orderItem = $this->orderItemRepository->where('order_id',$orderId)->where('product_id',$request->product_id)->first();
            if($orderItem!=null){
                $orderItem->delete();
                CustomLog::getInstance()->info("User successfully removed product: (". $request->product_id.") from his cart;;;order Id = ".$orderId);

                $total = $this->orderRepository->getOrderTotal(['order_id'=>$orderId]);
                return [
                    'result'=>true,
                    'product_id'=>$request->product_id,
                    'total'=>$total
                ];
            }else{
                CustomLog::getInstance()->info("!!!UnauthorizedAction");
                abort(401,'Item not found');
            }

        }else{
            return ['result'=>false];
            CustomLog::getInstance()->info("No order found");
        }
    }
}
