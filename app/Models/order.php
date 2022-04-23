<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public $fillable=["customer_id","created_at"];


    public function customer(){

        return $this->belongsTo("App\Models\customer","customer_id");
    }


}
