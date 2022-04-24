<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class engine extends Model
{
    use HasFactory;

    public $fillable=["name","model_id","power","created_at"];

    public function model(){

        return $this->belongsTo("App\Models\models","model_id");

    }


    public function cars(){

        return $this->hasMany("App\Models\car","engine_id");

    }


}
