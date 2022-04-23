<?php

namespace App\repo\api\classes;

use App\Models\engine as ModelsEngine;
use App\repo\api\interfaces\engine as engineInterface;

class engine implements engineInterface{


    public function getAllEngine1()
    {
        return ModelsEngine::all();
    }

    public function store($request)
    {

        $engine=new ModelsEngine();
        $engine->name=$request->name;
        $engine->model_id=$request->model_id;
        $engine->power=$request->power;
        $engine->save();
        return $engine;

    }


    public function update($request)
    {

        $engine=ModelsEngine::findOrFail($request->id);
        $engine->name=$request->name;
        $engine->model_id=$request->model_id;
        $engine->power=$request->power;
        $engine->save();
        return $engine;

    }


    public function delete($id){

        return ModelsEngine::findOrFail($id)->delete();


    }


}
