<?php

namespace App\Http\Controllers;

use App\Helpers\CustomLog;
use App\Http\Requests\PaymentRequest;
use App\Repositories\OrderRepository;
use Cassandra\Custom;
use Illuminate\Http\Request;

class PaymentController extends BaseController
{

    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        parent::__construct();
    }

    public function index(){
        //$countries =
        return view('payment');
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
