<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\event\category\domain\contracts\CategoryRepositoryInterface;
use Src\event\category\infrastructure\repositories\EloquentCategoryRepository;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(CategoryRepositoryInterface::class ,EloquentCategoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
