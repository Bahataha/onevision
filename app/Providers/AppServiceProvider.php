<?php

namespace App\Providers;

use App\Repository\PostDummy\PostDummyRepository;
use App\Repository\PostDummy\PostDummyRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostDummyRepositoryInterface::class, PostDummyRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
