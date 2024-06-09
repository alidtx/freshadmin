<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        View::composer(['layouts.app'], function ($view){
            $view->with( ['settings'=>Setting::all()]) ;
 
         });
         View::composer(['auth.'], function ($view){
            $view->with( ['settings'=>Setting::all()]) ;
 
         });
        // $environment = env('APP_ENV');

        // if ($environment === 'local') {
        //     URL::forceScheme('https');
        // }
    }
}