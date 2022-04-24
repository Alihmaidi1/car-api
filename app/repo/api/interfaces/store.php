<?php

namespace App\repo\api\interfaces;

interface store{

    public function getAllStores();
    public function store($request);
    public function update($request);
    public function delete($id);
    public function getStoreManager($id);


}
