<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    use HasFactory;

    public $fillable=["name","country","create_Date","created_at"];

    public function engines(){

        return $this->hasMany("App\Models\\engine","model_id");


    }

}
