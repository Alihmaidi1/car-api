<?php

namespace App\repo\api\interfaces;


interface manager{

    public function getAllManager();
    public function store($request);
    public function update($request);
    public function delete($id);

}
