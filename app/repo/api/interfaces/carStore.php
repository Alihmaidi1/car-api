<?php

namespace App\repo\api\interfaces;

interface carStore{

    public function getAllCarStore();
    public function store($request);
    public function update($request);

    public function delete($id);


}
