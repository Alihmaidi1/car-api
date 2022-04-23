<?php

namespace App\repo\api\interfaces;
interface customer{


    public function getAllcustomer();
    public function store($request);
    public function update($request);
    public function delete($id);

}
