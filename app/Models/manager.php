<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager extends Model
{
    use HasFactory;

    public $fillable=["name","address","birthDay","salary","created_at"];


    public function stores(){

        return $this->hasMany("App\Models\store","manager_id");


    }


}
