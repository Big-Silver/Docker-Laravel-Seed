<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Repository\ContactRepositoryInterface;
use App\Repository\ProductRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\ContactRepository;
use App\Repository\Eloquent\ProductRepository;
use App\Repository\Eloquent\RoleRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
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
