<?php

namespace App\Http\Controllers\api\carStores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\api\interfaces\carStore as carStoreInterface;
use App\Models\storeCar as carStoreModels;
use App\Http\Requests\api\carstores\store as storeRequest;
use App\Http\Requests\api\carstores\update;

class carStore extends Controller
{


    public $carStore;
    public function __construct(carStoreInterface $carStore)
    {

        $this->carStore=$carStore;

    }
    public function getAllCarStore(){

        try{

            $carStores=$this->carStore->getAllCarStore();
            return response()->json(["data"=>$carStores,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get All CarStore"]);

        }


    }


    public function findCarStore($id){

        try{

            $carStore=carStoreModels::findOrFail($id);
            return response()->json(["data"=>$carStore,"message"=>"Success","status"=>200]);

        }catch(\Exception $ex){


            return response()->json(["data"=>[],"message"=>"We Can't Find This CarStore","status"=>500]);

        }

    }



    public function store(storeRequest $request){

        try{

            $carstore=$this->carStore->store($request);
            return response()->json(["data"=>$carstore->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Add CarStore"]);


        }





    }




    public function update(update $request){

        try{

            $carStore=$this->carStore->update($request);
            return response()->json(["data"=>$carStore->toArray(),"status"=>200,"message"=>"Success"]);


        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Update This CarStore"]);


        }




    }



    public function delete(Request $request){

        try{

            $carStore=$this->carStore->delete($request->id);
            return response()->json(["data"=>$carStore->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $request){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Delete This CarStores"]);


        }




    }






}
