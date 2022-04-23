<?php

namespace App\repo\api\classes;

use App\repo\api\interfaces\car as carInterface;
use App\Models\car as carModel;
use App\Models\carType;
use App\Models\engine;

class car implements carInterface{


    public function getAllCars()
    {

        return carModel::all();

    }

    public function store($request)
    {

        $car=new carModel();
        $car->name=$request->name;
        $car->type_id=$request->type_id;
        $car->number=$request->number;
        $car->engine_id=$request->engine_id;
        $car->save();
        return $car;



    }

    public function update($request){

        $car=carModel::findOrFail($request->id);
        $car->name=$request->name;
        $car->type_id=$request->type_id;
        $car->number=$request->number;
        $car->engine_id=$request->engine_id;
        $car->save();
        return $car;


    }



    public function delete($id){

        $car=carModel::findOrFail($id);
        $car1=$car;
        $car->delete();
        return $car1;

    }


    public function carsFromEngine($id){

        $engine=engine::findOrFail($id);
        $cars=$engine->cars;
        return $cars;

    }

    public function carsFromType($id){

        $type=carType::findOrFail($id);
        $cars=$type->cars;
        return $cars;

    }


}
