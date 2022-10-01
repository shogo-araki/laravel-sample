<?php

namespace App\Providers;

use App\DataProvider\Database\RegisterReviewDataProvider;
use App\DataProvider\RegisterReviewInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(RegisterReviewInterface::class, function(){
            return new RegisterReviewDataProvider;
        });
    }
}
