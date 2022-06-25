<?php

namespace App\Providers;

use App\Repository\Eloquent\ProductModule\ProductCategoryRepository;
use App\Repository\Eloquent\ProductModule\ProductRepository;
use App\Repository\Interfaces\ProductModule\ProductCategoryRepositoryInterface;
use App\Repository\Interfaces\ProductModule\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProductCategoryRepositoryInterface::class, ProductCategoryRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
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
