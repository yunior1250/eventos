<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\event\product\domain\contracts\ProductRepositoryInterface;
use Src\event\product\infrastructure\repositories\EloquentProductRepository;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class,EloquentProductRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
