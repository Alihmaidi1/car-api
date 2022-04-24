<?php

namespace App\repo\api\interfaces;
interface orderDetail{

    public function getAllOrderDetail();
    public function store($request);
    public function update($request);
    public function delete($id);
    public function getDetailByOrder($id);
    public function getDetailBycarStore($id);

}
