<?php

namespace App\Providers;

use App\Repositories\Contracts\ExampleRepository;
use App\Repositories\Eloquent\ExampleRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
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
        $this->app->bind(ExampleRepository::class, ExampleRepositoryEloquent::class);
        //:end-bindings:
    }
}
