<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// interface
use App\Repositories\DataUmkmRepositoryInterface;
use App\Repositories\JenisUsahaRepositoryInterface;

// repository
use App\Repositories\Mysql\DataUmkmRepository;
use App\Repositories\Mysql\JenisUsahaRepository;

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
        $this->app->bind(JenisUsahaRepositoryInterface::class, JenisUsahaRepository::class);
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
