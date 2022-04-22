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
