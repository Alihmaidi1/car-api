<?php
namespace App\repo\api\classes;
use App\repo\api\interfaces\admin as adminInterface;
use App\Models\admin as Modelsadmin;
use Illuminate\Support\Facades\Hash;

class admin implements adminInterface{


    public function store($request)
    {

        $admin=new Modelsadmin();
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        $admin->save();
        return $admin;
    }

}
