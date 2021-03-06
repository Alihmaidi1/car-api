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
        $this->app->bind("App\\repo\api\interfaces\car","App\\repo\api\classes\car");
        $this->app->bind("App\\repo\api\interfaces\manager","App\\repo\api\classes\manager");
        $this->app->bind("App\\repo\api\interfaces\store","App\\repo\api\classes\store");
        $this->app->bind("App\\repo\api\interfaces\carStore","App\\repo\api\classes\carStore");
        $this->app->bind("App\\repo\api\interfaces\customer","App\\repo\api\classes\customer");
        $this->app->bind("App\\repo\api\interfaces\order","App\\repo\api\classes\order");
        $this->app->bind("App\\repo\api\interfaces\\employee","App\\repo\api\classes\\employee");
        $this->app->bind("App\\repo\api\interfaces\orderDetail","App\\repo\api\classes\orderDetail");
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
