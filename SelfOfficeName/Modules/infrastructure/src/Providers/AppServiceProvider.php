<?php

namespace Selfofficename\Modules\InfraStructure\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Selfofficename\Modules\Domain\Product\Http\Contracts\Repository\ProductInterface;
use Selfofficename\Modules\Domain\Product\Services\ProductService;

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
        $this->app->bind(ProductInterface::class, ProductService::class);
        Paginator::useBootstrap();
    }
}
