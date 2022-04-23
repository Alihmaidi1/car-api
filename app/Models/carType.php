<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carType extends Model
{
    use HasFactory;

    public $fillable=["name","created_at"];

    public function cars(){

        return $this->hasMany("App\Models\car","type_id");

    }
}
