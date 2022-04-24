<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public $fillable=["customer_id","employee_dealing","employee_service","created_at"];


    public function customer(){

        return $this->belongsTo("App\Models\customer","customer_id");
    }


    public function orderDetail(){

        return $this->hasMany("App\Models\orderDetail","order_id");
    }

    public function getemployee_dealing(){

        return $this->belongsTo("App\Models\\employee","employee_dealing");

    }

    public function getemployee_service(){

        return $this->belongsTo("App\Models\\employee","employee_service");

    }


}
