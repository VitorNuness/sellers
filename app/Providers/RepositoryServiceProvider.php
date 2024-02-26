<?php

namespace App\Providers;

use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Repositories\SaleRepository;
use App\Repositories\SellerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            SellerRepositoryInterface::class,
            SellerRepository::class,
        );

        $this->app->bind(
            SaleRepositoryInterface::class,
            SaleRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
