<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Schema; //Import Schema

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    function boot()
    {
        Schema::defaultStringLength(191); //Solved by increasing StringLength
       // Resource::withoutWrapping();
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
