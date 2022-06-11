<?php

namespace App\Providers;

use App\Repository\Eloquent\ProductModule\ProductCategoryRepository;
use App\Repository\Interfaces\ProductModule\ProductCategoryRepositoryInterface;
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
