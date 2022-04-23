<?php

namespace App\Http\Controllers\api\customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer as customerModel;
use App\repo\api\interfaces\customer as customerInterface;
use App\Http\Requests\api\customers\store as storeRequest;
use App\Http\Requests\api\customers\update;

class customer extends Controller
{

    public $customer;
    public function __construct(customerInterface $customer)
    {
        $this->customer=$customer;
    }
    public function getAllcustomer(){

        try{
            $customers=$this->customer->getAllcustomer();
            return response()->json(["data"=>$customers->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get All Customer"]);


        }

    }



    public function findcustomer($id){

        try{

            $customer=customerModel::findOrFail($id);
            return response()->json(["data"=>$customer->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"we Can't Get The Customer Data"]);


        }



    }




    public function store(storeRequest $request){

        try{

            $customer=$this->customer->store($request);
            return response()->json(["data"=>$customer->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"we Can't Add Customer"]);


        }



    }



    public function update(update $request){

        try{

            $customer=$this->customer->update($request);
            return response()->json(["data"=>$customer->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Update Customer Data"]);


        }





    }




    public function delete(Request $request){

        try{

            $customer=$this->customer->delete($request->id);

            return response()->json(["data"=>$customer->toArray(),"status"=>200,"message"=>"Success"]);


        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Delete Customer Data"]);



        }



    }



}
