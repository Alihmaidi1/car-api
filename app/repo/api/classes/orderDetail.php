<?php

namespace App\repo\api\classes;

use App\Models\order;
use App\repo\api\interfaces\orderDetail as orderDetailInterface;
use App\Models\orderDetail as orderDetailModel;
use App\Models\storeCar;

class orderDetail implements orderDetailInterface{


    public function getAllOrderDetail(){

        return orderDetailModel::all();

    }

    public function store($request)
    {

        $orderDetail=new orderDetailModel();
        $orderDetail->order_id=$request->order_id;
        $orderDetail->carStore_id=$request->carStore_id;
        $orderDetail->quantity=$request->quantity;
        $orderDetail->save();
        return $orderDetail;


    }


    public function update($request)
    {

        $orderDetail=orderDetailModel::findOrFail($request->id);
        $orderDetail->order_id=$request->order_id;
        $orderDetail->carStore_id=$request->carStore_id;
        $orderDetail->quantity=$request->quantity;
        $orderDetail->save();
        return $orderDetail;

    }

    public function delete($id)
    {

        $orderDetail=orderDetailModel::findOrFail($id);
        $orderDetail1=$orderDetail;
        $orderDetail->delete();
        return $orderDetail1;

    }


    public function getDetailByOrder($id){

        $order=order::findOrFail($id);
        $details=$order->orderDetail;
        return $details;


    }

    public function getDetailBycarStore($id){

        $carStore=storeCar::findOrFail($id);
        $details=$carStore->orderDetail;
        return $details;

    }
}
