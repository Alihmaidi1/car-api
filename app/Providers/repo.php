<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class repo extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind("App\\repo\api\interfaces\admin","App\\repo\api\classes\admin");
        $this->app->bind("App\\repo\api\interfaces\model","App\\repo\api\classes\model");
        $this->app->bind("App\\repo\api\interfaces\\engine","App\\repo\api\classes\\engine");
        $this->app->bind("App\\repo\api\interfaces\carType","App\\repo\api\classes\carType");

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
