<?php

namespace App\Http\Controllers\api\orderDetails;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\orderDetails\store;
use App\Http\Requests\api\orderDetails\update;
use App\Models\orderDetail as ModelsOrderDetail;
use Illuminate\Http\Request;
use App\repo\api\interfaces\orderDetail as orderDetailInterface;
class orderDetail extends Controller
{

    public $orderDetail;
    public function __construct(orderDetailInterface $orderDetail){


        $this->orderDetail=$orderDetail;

    }
    public function getAllOrderDetail(){

        try{

            $orderDetails=$this->orderDetail->getAllOrderDetail();
            return response()->json(["data"=>$orderDetails,"status"=>200,"message"=>"Success"]);


        }catch(\Exception $e){


            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get All OrderDetails"]);

        }


    }


    public function findOrderDetail($id){

        try{

            $orderDetail=ModelsOrderDetail::findOrFail($id);
            return response()->json(["data"=>$orderDetail->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get OrderDetail"]);

        }


    }


    public function store(store $request){

        try{

            $orderDetail=$this->orderDetail->store($request);
            return response()->json(["data"=>$orderDetail->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We can't Add orderDetail"]);

        }



    }


    public function update(update $request){

        try{

            $orderDetail=$this->orderDetail->update($request);
            return response()->json(["data"=>$orderDetail->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Update OrderDetail"]);

        }



    }




    public function delete(Request $request){

        try{

            $orderDetail=$this->orderDetail->delete($request->id);
            return response()->json(["data"=>$orderDetail->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){


            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Delete This OrderDetail"]);

        }



    }


    public function getByOrder(Request $request){

        try{

            $details=$this->orderDetail->getDetailByOrder($request->id);
            return response()->json(["data"=>$details->toarray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){
            return response()->json(["data"=>[],"status"=>500,"messages"=>"We Can't Get All Order Details"]);
        }
    }

    public function getBycarStore(Request $request){

        try{

            $detail=$this->orderDetail->getDetailBycarStore($request->id);
            return response()->json(["data"=>$detail,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get All Order Detail "]);

        }





    }

}
