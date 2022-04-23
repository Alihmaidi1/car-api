<?php

namespace App\repo\api\interfaces;

interface order{

    public function getAllOrder();
    public function store($request);
    public function update($request);
    public function delete($id);
    public function getOrdersCustomer($id);

}
