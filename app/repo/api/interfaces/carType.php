<?php

namespace App\repo\api\interfaces;

interface carType{


    public function getAllType();
    public function store($request);
    public function update($request);
    public function delete($id);


}
