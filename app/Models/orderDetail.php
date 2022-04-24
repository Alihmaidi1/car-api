<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    use HasFactory;

    public $fillable=["order_id","carStore_id","quantity","created_at"];


    public function order(){

        return $this->belongsTo("App\Models\order","order_id");

    }


    public function carStore(){

        return $this->belongsTo("App\Models\storeCar","carStore_id");
    }



}
