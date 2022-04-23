<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    public $fillable=["name","address","salary","store_id","created_at"];

    public function store(){

        return $this->belongsTo("App\Models\store","store_id");
    }


    public function order_dealing(){

        return $this->hasMany("App\Models\order","employee_dealing");


    }

    public function order_service(){

        return $this->hasMany("App\Models\order","employee_service");


    }




}
