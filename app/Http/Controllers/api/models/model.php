<?php

namespace App\Http\Controllers\api\models;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\model\delete;
use App\Models\models;
use Illuminate\Http\Request;
use App\repo\api\interfaces\model as modelInterface;
use App\Http\Requests\api\model\store as storeRequest;
use App\Http\Requests\api\model\update as updateRequest;

class model extends Controller
{
    public $model;
    public function __construct(modelInterface $model)
    {
        $this->model=$model;
    }

    public function getAllModel(){

        try{

            $models=$this->model->getAllModels();
            return response()->json(["data"=>$models,"status"=>200,"message"=>"Success"]);
        }catch(\Exception $e){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get the Models"]);

        }


    }

    public function findModel($id){

        try{

            return response()->json(["data"=>models::find($id),"message"=>"Success","status"=>200]);

        }catch(\Exception $e){

            return response()->json(["data"=>[],"message"=>"We Can't Get The Model","status"=>500]);

        }

    }



    public function store(storeRequest $request){

        try{
            $model=$this->model->store($request);
            return response()->json(["data"=>$model->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $e){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Create a Car Model"]);

        }

    }


    public function update(updateRequest $request){

        try{

            $model=$this->model->update($request);

            return response()->json(["data"=>$model->toArray(),"message"=>"Success","status"=>200]);


        }catch(\Exception $e){

            return response()->json(["data"=>[],"message"=>"we Can't Update The Model","status"=>500]);

        }

    }


    public function delete(delete $request){

        try{

            $model=$this->model->delete($request->id);
            return response()->json(["data"=>$model->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $e){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Delete this Model"]);


        }


    }




}
