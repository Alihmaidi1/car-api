<?php

namespace App\Http\Controllers\api\carTypes;

use App\Http\Controllers\Controller;
use App\Models\carType as ModelsCarType;
use Illuminate\Http\Request;
use App\repo\api\interfaces\carType as carTypeInterface;
use App\Http\Requests\api\carTypes\store as storeRequest;
use App\Http\Requests\api\carTypes\update as CarTypesUpdate;
use App\Http\Requests\carTypes\update;

class carType extends Controller
{

    public $carType;
    public function __construct(carTypeInterface $carType)
    {
        $this->carType=$carType;
    }

    public function getAllType(){

        try{

            $types=$this->carType->getAllType();

            return response()->json(["status"=>200,"message"=>"Success","data"=>$types]);

        }catch(\Exception $ex){

            return response()->json(["status"=>500,"message"=>"we Can't get All Car Type","data"=>[]]);

        }


    }



    public function findCarType($id){

        try{
            $type=ModelsCarType::findOrFail($id);
            return response()->json(["data"=>$type->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't get The Type Car"]);


        }


    }


    public function store(storeRequest $request){


        try{

            $type=$this->carType->store($request);
            return response()->json(["data"=>$type->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Create Car Type"]);

        }



    }



    public function update(CarTypesUpdate $request){


        try{

            $type=$this->carType->update($request);
            return response()->json(["data"=>$type->toArray(),"status"=>200,"message"=>"Success"]);


        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Update Car Type Data"]);



        }




    }


    public function delete(Request $request){

        try{

            $type=$this->carType->delete($request->id);
            return response()->json(["data"=>$type->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Delete the Car Type"]);


        }


    }







}
