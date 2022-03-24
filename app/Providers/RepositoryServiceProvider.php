<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\DataUmkmRepositoryInterface;
use App\Repositories\Mysql\DataUmkmRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DataUmkmRepositoryInterface::class, DataUmkmRepository::class);
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
