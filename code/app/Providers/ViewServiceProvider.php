<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $interiorService = app(\App\Services\InteriorService::class);
        $serviceService = app(\App\Services\ServiceService::class);

        $interiors = $interiorService->getAllInteriors();
        $services = $serviceService->getAllServices();
        view()->composer('layouts.header', function ($view) use ($interiors, $services) {
            $view->with('interiors',$interiors);
            $view->with('services',$services);
         });
    }
}
