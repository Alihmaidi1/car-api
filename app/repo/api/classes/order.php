<?php

namespace App\repo\api\classes;

use App\Models\customer;
use App\repo\api\interfaces\order as orderInterface;
use App\Models\order as orderModel;
class order implements orderInterface{


    public function getAllOrder()
    {

        return orderModel::all();


    }


    public function store($request)
    {

        $order=new orderModel();
        $order->customer_id=$request->customer_id;
        $order->save();
        return $order;
    }


    public function update($request)
    {

        $order=orderModel::findOrFail($request->id);
        $order->customer_id=$request->customer_id;
        $order->save();
        return $order;

    }


    public function delete($id)
    {

        $order=orderModel::findOrFail($id);
        $order1=$order;
        $order->delete();
        return $order1;

    }


    public function getOrdersCustomer($id)
    {

        $customer=customer::findOrFail($id);
        $orders=$customer->orders;
        return $orders;


    }
}
