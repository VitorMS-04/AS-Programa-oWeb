<?php

namespace App\Providers;

use App\Models\Produto;
use App\Policies\ProdutoPolicy;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Produto::class, ProdutoPolicy::class);
    }
}
