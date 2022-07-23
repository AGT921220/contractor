<?php

namespace App\Providers;

use App\Bussines\GeneralCatalog\Domain\GeneralCatalogRepository;
use App\Bussines\GeneralCatalog\Infrastructure\GeneralCatalogEloquentRepository;
use Illuminate\Support\ServiceProvider;

class GeneralCatalogServiceProvider extends ServiceProvider
{

    public $bindings = [
        GeneralCatalogRepository::class=>GeneralCatalogEloquentRepository::class
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
