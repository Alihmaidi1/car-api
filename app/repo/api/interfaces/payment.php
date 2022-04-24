<?php

namespace App\repo\api\interfaces;


interface payment{

    public function getAllPayment();
    public function store($request);
    public function update($request);
    public function delete($id);
    public function getPaymentsByOrder($id);



}
