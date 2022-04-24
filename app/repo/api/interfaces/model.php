<?php

namespace App\repo\api\interfaces;

interface model{

    public function getAllModels();
    public function store($request);
    public function update($request);

    public function delete($id);

}
