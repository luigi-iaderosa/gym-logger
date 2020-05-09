<?php

namespace App\Providers;

use App\Models\Derived\Customer;
use Illuminate\Support\ServiceProvider;
use function request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Customer::class,function($app){
            $user = request()->user();
            return new Customer($user);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
