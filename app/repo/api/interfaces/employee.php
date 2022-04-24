<?php

namespace App\repo\api\interfaces;
interface employee{


    public function getAllEmployee();
    public function store($request);
    public function update($request);
    public function delete($id);
    public function getEmployeeFromStore($id);


}
