<?php

namespace App\Providers;

use App\Bussines\Proyect\Domain\ProyectRepository;
use App\Bussines\Proyect\Infrastructure\ProyectEloquentRepository;
use Illuminate\Support\ServiceProvider;

class ProyectServiceProvider extends ServiceProvider
{
    public $bindings = [
        ProyectRepository::class=>ProyectEloquentRepository::class
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
