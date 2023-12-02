<?php

namespace Selfofficename\Modules\Domain\Product;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Selfofficename\Modules\Domain\Product\Console\Commands\FireCommand;
use Selfofficename\Modules\Domain\Product\Models\Schemas\Constants\ProductConstants;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routeRegister();
        $this->loadMigrationsFrom(__DIR__.ProductConstants::MIGRATION_ROUTE);
        $this->commands([FireCommand::class]);
    }

    /**
     * @return void
     */
    private function routeRegister(): void
    {
        Route::prefix(ProductConstants::PREFIX)
            ->namespace(ProductConstants::CONTROLLER_ROUTE)
            ->group(__DIR__.ProductConstants::API_ROUTE);
    }
}
