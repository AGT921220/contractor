<?php

namespace App\Providers;

use App\Bussines\Subcontractor\Domain\SubcontractorRepository;
use App\Bussines\Subcontractor\Infrastructure\SubcontractorEloquentRepository;
use Illuminate\Support\ServiceProvider;

class SubcontractorServiceProvider extends ServiceProvider
{

    public $bindings = [
        SubcontractorRepository::class=>SubcontractorEloquentRepository::class
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
