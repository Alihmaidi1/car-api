<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    public $fillable=["name","address","birthDay","phone"];

    public function orders(){

        return $this->hasMany("App\Models\order","customer_id");


    }
}
