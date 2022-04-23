<?php

namespace App\Http\Controllers\api\orders;

use App\Http\Controllers\Controller;
use App\Models\order as ModelsOrder;
use Illuminate\Http\Request;
use App\repo\api\interfaces\order as orderInterface;
use App\Http\Requests\api\orders\store as storeRequest;
use App\Http\Requests\api\orders\update;

class order extends Controller
{

    public $order;
    public function __construct(orderInterface $order)
    {

        $this->order=$order;

    }
    public function getAllorder(){

        try{

            $order=$this->order->getAllOrder();
            return response()->json(["data"=>$order->toArray(),"status"=>200,"message"=>"Success"]);


        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get All Order"]);


        }

    }


    public function findorder($id){

        try{

            $order=ModelsOrder::findOrFail($id);
            return response()->json(["data"=>$order->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't get This Order"]);

        }





    }



    public function store(storeRequest $request){

        try{

            $order=$this->order->store($request);
            return response()->json(["data"=>$order->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't add order"]);

        }


    }


    public function update(update $request){

        try{

            $order=$this->order->update($request);
            return response()->json(["data"=>$order->toArray(),"status"=>200,"message"=>"Success"]);


        }catch(\Exception $request){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Update This Order"]);

        }




    }


    public function delete(Request $request){

        try{

            $order=$this->order->delete($request->id);
            return response()->json(["data"=>$order->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't delete This Order"]);

        }

    }


    public function getOrdersCustomer(Request $request){

        try{

            $orders=$this->order->getOrdersCustomer($request->id);
            return response()->json(["data"=>$orders,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get All Order For This Customer"]);

        }



    }




}
