<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    public $fillable=["order_id","price","created_at"];


    public function order(){

        return $this->belongsTo("App\Models\order","order_id");
    }



}
