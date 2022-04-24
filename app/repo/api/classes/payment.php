<?php

namespace App\repo\api\classes;

use App\Models\order;
use App\repo\api\interfaces\payment as paymentInterface;
use App\Models\payment as paymentModels;
class payment implements paymentInterface{


    public function getAllPayment(){

        return paymentModels::all();

    }

    public function store($request){

        $payment=new paymentModels();
        $payment->order_id=$request->order_id;
        $payment->price=$request->price;
        $payment->save();
        $order=order::findOrFail($request->order_id);
        $order->debit=$order->debit+$request->price;
        $order->save();
        return $payment;

    }


    public function update($request){


        $payment=paymentModels::findOrFail($request->id);
        $order=order::findOrFail($payment->order_id);
        $order->debit=$order->debit-$payment->price;
        $order->save();
        $payment->order_id=$request->order_id;
        $payment->price=$request->price;
        $payment->save();
        $order=order::findOrFail($payment->order_id);
        $order->debit=$order->debit+$payment->price;
        $payment->save();
        return $payment;



    }


    public function delete($id)
    {

        $payment=paymentModels::findOrFail($id);
        $payment1=$payment;
        $payment->delete();
        return $payment1;

    }


    public function getPaymentsByOrder($id){

        $order=order::FindOrFail($id);
        $payments=$order->payments;
        return $payments;


    }


}
