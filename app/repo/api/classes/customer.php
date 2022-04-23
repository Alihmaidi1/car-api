<?php

namespace App\repo\api\classes;
use App\repo\api\interfaces\customer as customerInterface;
use App\Models\customer as customerModel;
class customer implements customerInterface{


    public function getAllcustomer(){

        return customerModel::all();

    }

    public function store($request)
    {

        $customer=new customerModel();
        $customer->name=$request->name;
        $customer->address=$request->address;
        $customer->birthDay=$request->birthDay;
        $customer->phone=$request->phone;
        $customer->save();
        return $customer;

    }

    public function update($request)
    {

        $customer=customerModel::findOrFail($request->id);
        $customer->name=$request->name;
        $customer->address=$request->address;
        $customer->birthDay=$request->birthDay;
        $customer->phone=$request->phone;
        $customer->save();
        return $customer;


    }


    public function delete($id){

        $customer=customerModel::findOrFail($id);
        $customer1=$customer;
        $customer->delete();
        return $customer;

    }

}
