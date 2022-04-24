<?php

namespace App\repo\api\interfaces;

interface carStore{

    public function getAllCarStore();
    public function store($request);
    public function update($request);

    public function delete($id);
    public function getCarstore_store($id);
    public function getCarStore_car($id);


}
