<?php

namespace App\Repositories;

use App\CommonValues;
use App\Helpers\CustomLog;
use App\Models\Order;
use App\Models\Receipient;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class OrderRepository.
 */
class OrderRepository extends BaseRepository
{

    private $receipientRepository;
    private $orderItemRepository;

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Order::class;
    }

    public function __construct(ReceipientRepository $receipientRepository,OrderItemRepository $orderItemRepository)
    {
        $this->receipientRepository = $receipientRepository;
        $this->orderItemRepository = $orderItemRepository;
    }

    public function create(array $data)
    {
        $data['order_datetime'] = Carbon::now()->toDateTimeString();
        return parent::create($data);
    }

    public function generateTrackingNbr(){
        return Carbon::now()->getTimestamp();
    }

    public function processPayment($data){
        $orderId = -1;
        try{
            DB::transaction(function () use ($data,$orderId){
                $receipient = $this->receipientRepository->create($data);
                if($receipient->receipient_id){
                    $data['receipient_id'] = $receipient->receipient_id;
                }

                $data['status'] = CommonValues::STATUS_PDELIVERY;
                $this->makeModel();
                $order = $this->create($data);
                $orderId = $order->order_id;
            });
            DB::commit();
            return $orderId;
        }catch (\Exception $exception){
            CustomLog::getInstance()->error("This was an error processing the payment: ".$exception->getMessage());
            DB::rollBack();
            return false;
        }
        return $orderId;
    }

    public function addToCart($data){
        $orderId = -1;
        try{
            $orderId = DB::transaction(function () use ($data,$orderId) {
                if (array_key_exists('order_id', $data) && $data['order_id'] > 0) {
                    $orderId = $data['order_id'];
                    $order = $this->where(
                        ['order_id' => $orderId],
                        ['status' => CommonValues::STATUS_CART]
                    );
                } else {
                    $data['status'] = CommonValues::STATUS_CART;
                    $data['tracking_nbr'] = $this->generateTrackingNbr();
                    $this->makeModel();
                    $order = $this->create($data);
                    $orderId = $order->order_id;
                }

                $orderItem = $this->orderItemRepository->where(
                    ['order_id' => $orderId],
                    ['product_id' => $data['product_id']],
                    ['price' => $data['price']]
                )->get();
                if (count($orderItem) == 0 ) {
                    $this->orderItemRepository->create(['order_id' => $orderId, 'product_id' => $data['product_id'], 'price' => $data['price'], 'quantity' => $data['quantity']]);
                } else {
                    $orderItem->quantity = $data['quantity'];
                    $orderItem->save();
                }
                return $orderId;
            });
            DB::commit();
        }catch (\Exception $exception){
            CustomLog::getInstance()->error($exception);
        }

        return $orderId;
    }

}
