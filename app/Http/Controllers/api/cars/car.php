<?php

namespace App\Http\Controllers\api\cars;

use App\Http\Controllers\Controller;
use App\Models\car as ModelsCar;
use Illuminate\Http\Request;
use App\repo\api\interfaces\car as carInterface;
use App\Http\Requests\api\cars\store as storeRequest;
use App\Http\Requests\api\cars\update;

class car extends Controller
{


    public $car;
    public function __construct(carInterface $car)
    {

        $this->car=$car;

    }
    public function getAllCar(){

        try{

            $cars=$this->car->getAllCars();
            return response()->json(["data"=>$cars,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"we Can't Get All Car Data"]);

        }

    }


    public function findCar($id){

        try{

            $car=ModelsCar::findOrFail($id);
            return response()->json(["data"=>$car->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't get the Car Data"]);
        }

    }


    public function store(storeRequest $request){

        try{

            $car=$this->car->store($request);
            return response()->json(["data"=>$car->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't create Car"]);


        }



    }



    public function update(update $request){

        try{

            $car=$this->car->update($request);
            return response()->json(["data"=>$car->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Update Car Data"]);
        }




    }



    public function delete(Request $request){

        try{

            $car=$this->car->delete($request->id);
            return response()->json(["data"=>$car->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Delete Car "]);

        }



    }



    public function carsFromEngine(Request $request){

        try{

            $cars=$this->car->carsFromEngine($request->id);
            return response()->json(["data"=>$cars,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get Cars"]);



        }


    }



    public function carsFromType(Request $request){

        try{

            $cars=$this->car->carsFromType($request->id);
            return response()->json(["data"=>$cars,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get Cars Data"]);



        }



    }





}
