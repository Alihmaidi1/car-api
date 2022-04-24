<?php

namespace App\Http\Controllers\api\payments;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\payments\store;
use App\Http\Requests\api\payments\update;
use App\Models\payment as ModelsPayment;
use Illuminate\Http\Request;
use App\repo\api\interfaces\payment as paymentInterface;
use Illuminate\Support\Facades\DB;

class payment extends Controller
{

    public $payment;
    public function __construct(paymentInterface $payment)
    {

        $this->payment=$payment;
    }

    public function getAllpayment(){

        try{
            $payments=$this->payment->getAllPayment();
            return response()->json(["data"=>$payments,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get All Payment"]);

        }


    }


    public function findpayment($id){

        try{

            $payment=ModelsPayment::findOrFail($id);
            return response()->json(["data"=>$payment->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"we Can't Get This Payment"]);

        }



    }


    public function store(store $request){

        DB::beginTransaction();
        try{

            $payment=$this->payment->store($request);
            DB::commit();
            return response()->json(["data"=>$payment->toArray(),"status"=>200,"message"=>"Success"]);
        }catch(\Exception $ex){
            DB::rollBack();
            return response()->json(["data"=>[],"status"=>500,"We Can't Add Payment"]);



        }




    }



    public function update(update $request){

        try{

            $payment=$this->payment->update($request);
            return response()->json(["data"=>$payment->toArray(),"status"=>200,"message"=>"Success"]);


        }catch(\Exception $ex){


            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Update This Payment"]);


        }




    }

    public function delete(Request $request){

        try{

            $payment=$this->payment->delete($request->id);
            return response()->json(["data"=>$payment->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Delete Payment"]);


        }


    }



    public function getPaymentsByOrder(Request $request){


        try{

            $payments=$this->payment->getPaymentsByOrder($request->id);
            return response()->json(["data"=>$payments->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"we Can't Get All Payment For This Order"]);

        }



    }


}
