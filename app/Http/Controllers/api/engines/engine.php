<?php

namespace App\Http\Controllers\api\engines;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\engine\delete;
use App\Models\engine as ModelsEngine;
use Illuminate\Http\Request;
use App\repo\api\interfaces\engine as engineInterface;
use App\Http\Requests\api\engine\store as storeRequest;
use App\Http\Requests\api\engine\update;

class engine extends Controller
{


    public $engine;
    public function __construct(engineInterface $engine)
    {

        $this->engine=$engine;

    }

    public function getAllEngine(){

        $engines=$this->engine->getAllEngine1();
        return response()->json(["data"=>$engines,"message"=>"Success","status"=>200]);

    }

    public function findEngine($id){

        try{

        $engine=ModelsEngine::findOrFail($id);
        return response()->json(["data"=>[],"status"=>200,"message"=>"Success"]);


        }catch(\Exception $e){

            return response()->json(["data"=>[],"status"=>404,"message"=>"The Object can't found"]);

        }


    }


    public function store(storeRequest $request){

        try{

            $engine=$this->engine->store($request);

            return response()->json(["data"=>$engine,"message"=>"Success","status"=>200]);


        }catch(\Exception $ex){

            return response()->json(["data"=>[],"message"=>"we Can't create the Engine","status"=>500]);


        }



    }



    public function update(update $request){

        try{

        $engine=$this->engine->update($request);
        return response()->json(["data"=>$engine,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $e){

            return response()->json(["data"=>[],"status"=>500,"message"=>"we Can't update the Engine Data"]);

        }

    }


    public function delete(delete $request){

        try{

            $engine=$this->engine->delete($request->id);

            return response()->json(["data"=>$engine,"status"=>200,"message"=>"Success"]);


        }catch(\Exception $e){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't delete the Engine"]);

        }

    }



    public function getEngine(Request $request){

        try{

            $engines=$this->engine->getEngine($request->id);
            return response()->json(["data"=>$engines->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't get the Engine Data"]);


        }


    }




}
