<?php

namespace App\repo\api\interfaces;

interface engine{

    public function getAllEngine1();
    public function store($request);

    public function update($request);

    public function delete($id);

}
