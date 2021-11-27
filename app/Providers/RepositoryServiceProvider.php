<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Repositories\PharmacyRepository;
use App\Repositories\Contracts\PharmacyRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register repositories.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(PharmacyRepositoryInterface::class, PharmacyRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }
}
