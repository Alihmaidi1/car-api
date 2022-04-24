<?php

namespace App\repo\api\classes;
use App\repo\api\interfaces\model as modelInterface;
use App\Models\models as Models;
class model implements modelInterface{


    public function getAllModels()
    {
        return Models::all();
    }

    public function store($request)
    {

        $model= new Models();
        $model->name=$request->name;
        $model->country=$request->country;
        $model->create_Date=$request->create_Date;
        $model->save();
        return $model;

    }


    public function update($request)
    {

        $model=Models::find($request->id);
        $model->name=$request->name;
        $model->country=$request->country;
        $model->create_Date=$request->create_Date;
        $model->save();
        return $model;


    }


    public function delete($id)
    {

        $model=Models::find($id);
        $model->delete();
        return $model;
    }





}
