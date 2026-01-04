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
        $cartService = app(\App\Services\CartService::class);



        view()->composer(
            ['layouts.header', 
            'home.cart', 
            'home.checkout',
            ], 
        function ($view) use ($interiorService, $serviceService, $cartService) {
            $view->with('interiors', $interiorService->getAllInteriors());
            $view->with('services', $serviceService->getAllServices());
            $view->with('cartCount', $cartService->countItems());
            $view->with('cartTotal', $cartService->totalPrice());
            $view->with('cartItems', $cartService->items());
         });
    }
}
