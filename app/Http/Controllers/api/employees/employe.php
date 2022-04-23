<?php

namespace App\Http\Controllers\api\employees;

use App\Http\Controllers\Controller;
use App\Models\employee as employeeModels;
use Illuminate\Http\Request;
use App\repo\api\interfaces\employee as employeeInterface;
use App\Http\Requests\api\employees\store as storeRequest;
use App\Http\Requests\api\employees\update;

class employe extends Controller
{


    public $employee;
    public function __construct(employeeInterface $employee)
    {

        $this->employee=$employee;

    }
    public function getAllemployee(){

        try{

            $employees=$this->employee->getAllEmployee();
            return response()->json(["data"=>$employees,"status"=>200,"message"=>"Success"]);
        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get All Employees"]);

        }


    }


    public function findemployee($id){

        try{

            $employee=employeeModels::findOrFail($id);
            return response()->json(["data"=>$employee->toArray(),"status"=>200,"message"=>"Success"]);


        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"we Can't find This employee"]);


        }

    }



    public function store(storeRequest $request){

        try{

            $employee=$this->employee->store($request);
            return response()->json(["data"=>$employee,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Add Employee"]);


        }




    }




    public function update(update $request){

        try{

            $employee=$this->employee->update($request);
            return response()->json(["data"=>$employee->toarray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't update Employee Data"]);


        }




    }



    public function delete(Request $request){

        try{

            $employee=$this->employee->delete($request->id);
            return response()->json(["data"=>$employee->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){


            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Deelte This Employee"]);
        }




    }


    public function getStore(Request $request){

        try{

            $employees=$this->employee->getEmployeeFromStore($request->id);
            return response()->json(["data"=>$employees,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){


            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get All Employee For this Store"]);

        }



    }



}
