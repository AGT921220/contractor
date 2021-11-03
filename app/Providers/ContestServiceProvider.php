<?php

namespace App\Providers;

use App\Bussines\Contest\Domain\ContestRepository;
use App\Bussines\Contest\Infrastructure\ContestEloquentRepository;
use Illuminate\Support\ServiceProvider;

class ContestServiceProvider extends ServiceProvider
{

    public $bindings = [
        ContestRepository::class=>ContestEloquentRepository::class
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
