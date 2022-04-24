<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storeCar extends Model
{
    use HasFactory;

    public $fillable=["quantity","store_id","car_id","created_at"];


    public function store(){

        return $this->belongsTo("App\Models\store","store_id");
    }


    public function car(){


        return $this->belongsTo("App\Models\car","car_id");

    }


    public function orderDetail(){

        return $this->hasMany("App\Models\orderDetail","carStore_id");
    }


}
