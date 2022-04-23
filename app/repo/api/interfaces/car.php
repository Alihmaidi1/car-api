<?php

namespace App\repo\api\interfaces;

interface car{


    public function getAllCars();
    public function store($request);
    public function update($request);

    public function delete($id);
    public function carsFromEngine($id);
    public function carsFromType($id);


}
