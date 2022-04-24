<?php

namespace App\repo\api\classes;
use App\repo\api\interfaces\employee as employeeInterface;
use App\Models\employee as employeeModels;
use App\Models\store as storeModels;
class employee implements employeeInterface{


    public function getAllEmployee(){

        return employeeModels::all();
    }

    public function store($request)
    {

        $employee=new employeeModels();
        $employee->name=$request->name;
        $employee->address=$request->address;
        $employee->salary=$request->salary;
        $employee->store_id=$request->store_id;
        $employee->save();
        return $employee;
    }

    public function update($request)
    {
        $employee=employeeModels::findOrFail($request->id);
        $employee->name=$request->name;
        $employee->address=$request->address;
        $employee->salary=$request->salary;
        $employee->store_id=$request->store_id;
        $employee->save();
        return $employee;

    }

    public function delete($id)
    {

        $employee=employeeModels::findOrFail($id);
        $employee1=$employee;
        $employee->delete();
        return $employee1;

    }

    public function getEmployeeFromStore($id){

        $store=storeModels::findOrFail($id);
        $employees=$store->employees;
        return $employees;

    }

}
