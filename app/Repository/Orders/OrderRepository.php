<?php


namespace App\Repository\Orders;



use App\Models\Order;
use App\Repository\Orders\OrderInterface;
use App\Traits\GeneralTrait;

use App\Traits\Image\ImageTrait;


class OrderRepository implements OrderInterface
{
    use  GeneralTrait, ImageTrait;

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function addOrder($request)
    {


        // TODO: Implement addOrder() method.
        $user = auth('sanctum')->user();
        $order=Order::create(
            [
                'user_id'=>$user->id,
                'order_number'=>$this->get_order_number(),
                'order_type_id'=>$request->order_type_id,
                'order_status_id'=>2,
                'currency'=>$request->currency,
                'amount'=>$request->amount,
                'payment_method_id'=>$request->payment_method_id,

            ]);
return $order;

    }
}
