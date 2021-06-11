<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Plan;
use App\Observers\CategoryObserver;
use App\Observers\PlanObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plan::observe(PlanObserver::class);
        Category::observe(CategoryObserver::class);
        Paginator::useBootstrap();
    }
}
