<?php

namespace App\Http\Controllers;

use App\CommonValues;
use App\Exceptions\UnauthorizedActionException;
use App\Helpers\CustomLog;
use App\Helpers\SecurityUtil;
use App\Http\Requests\PaymentRequest;
use App\Repositories\OrderRepository;
use Cassandra\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PaymentController extends BaseController
{

    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        parent::__construct();
    }

    public function index(Request $request){
        $orderItems = [];
        if($request->cookie(SecurityUtil::ORDER_COOKIE_KEY) != null){
            $orderRepository = App::make('App\Repositories\OrderRepository');

            $orderId = (int)SecurityUtil::decrypt($request->cookie(SecurityUtil::ORDER_COOKIE_KEY));
            $orderRepository->makeModel();
            $order = $orderRepository->where('order_id',$orderId)->where('status',CommonValues::STATUS_CART)->get();

            if(count($order) > 0){
                $order = $order[0];
                $orderItemRepository = App::make('App\Repositories\OrderItemRepository');
                $orderItems = $orderItemRepository->where('order_id',$orderId)->get();
            }
        }else{
            CustomLog::getInstance()->info('UNAUTHORIZED!! User tried to access checkout screen without having any orders');
            abort(401);
        }
        return view('payment',compact('orderItems'));
    }

    public function submit(PaymentRequest $request){
        try{
            $orderId = $this->orderRepository->processPayment($request->all());
            if($orderId){
                $result = true;
                $message = __('titles.payment_submitted_success');
                CustomLog::getInstance()->info("User successfully submitted order number: ".$orderId);
            }else{
                $result = false;
                $message = __('titles.payment_submitted_error');
                CustomLog::getInstance()->error("There was an error submitting user's order");
            }
            return redirect()->route('payment')->with($result,$message);
        }catch (\Exception $exception){
            CustomLog::getInstance()->error($exception);
        }
    }
}
