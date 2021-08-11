<?php

namespace App\Http\Controllers;

use App\CommonValues;
use App\Helpers\SecurityUtil;
use App\Models\Cart;
use App\Models\Collection;
use App\Repositories\CollectionRepository;
use Exception;
use http\Cookie;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;


class BaseController extends Controller
{

    protected $showNavbar = true;
    protected $showCart = true;


    private $collectionRepository;

    public function __construct()
    {
        if(! \request()->ajax()) {
            if ($this->showNavbar) {
                $this->collectionRepository = App::make('App\Repositories\CollectionRepository');
                $menuCollections = $this->collectionRepository->getMenuCollections();
                View::share('menuCollections', $menuCollections);
            }
            if ($this->showCart) {
                $this->showCartView(\request());
            }

            //if (\request()->has('XDEBUG_SESSION_START')) \request()->session()->put('debug_port' , );
        }
        $xdebugPort = \request()->has('XDEBUG_SESSION_START') ? \request()->get('XDEBUG_SESSION_START') : 'PHPSTORM';

        View::share([
                'showNavbar'=>$this->showNavbar,
                'showCart'=>$this->showCart,
                'xdebugPort'=>$xdebugPort
            ]);


    }

    public function sendResponse($data, $message = "",$success = true)
    {
        $response = [
            'success' => $success,
            'data' => $data,
        ];
        if ($message != "") {
            $response += ['message' => $message];
        }

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 400)
    {
        $response = [
            'success' => 'false',
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['errors'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function sendErrorException(Exception $exception)
    {
        $exceptionCode = $exception->getCode();
        if ($exceptionCode == 0) {
            $exceptionCode = 500;
        }
        //return $this->sendError($exception->getMessage(),$exception,500);
        return $this->sendError('Something went wrong.', [], 500);
    }

    function showCartView(Request $request){

        $orderRepository = App::make('App\Repositories\OrderRepository');
        $orderItems = [];
        if($request->cookie(SecurityUtil::ORDER_COOKIE_KEY) != null){
            $orderId = (int)SecurityUtil::decrypt($request->cookie(SecurityUtil::ORDER_COOKIE_KEY));
            $orderRepository->makeModel();
            $order = $orderRepository->where('order_id',$orderId)->where('status',CommonValues::STATUS_CART)->get();

            if(count($order) > 0){
                $order = $order[0];
                $orderItemRepository = App::make('App\Repositories\OrderItemRepository');
                $orderItems = $orderItemRepository->where('order_id',$orderId)->get();
            }
        }
        View::share('cartItems',$orderItems);
    }
}
