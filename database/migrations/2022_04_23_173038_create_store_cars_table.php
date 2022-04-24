<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_cars', function (Blueprint $table) {
            $table->id();
            $table->string("quantity");
            $table->unsignedBigInteger("store_id");
            $table->foreign("store_id")->references("id")->on("stores");
            $table->unsignedBigInteger("car_id");
            $table->foreign("car_id")->references("id")->on("cars");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_cars');
    }
};
