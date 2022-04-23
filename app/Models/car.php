<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    public $fillable=["name","number","type_id","engine_id","created_at"];

    public function engine(){

        return $this->belongsTo("App\Models\\engine","engine_id");
    }

    public function type(){

        return $this->belongsTo("App\Models\carType","type_id");
    }


}
