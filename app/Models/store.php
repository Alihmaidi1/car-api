<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;

    public $fillable=["name","address","manager_id"];


    public function manager(){

        return $this->belongsTo("App\Models\manager","manager_id");

    }

}