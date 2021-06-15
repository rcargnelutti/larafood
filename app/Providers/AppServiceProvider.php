<?php

namespace App\Providers;

use App\Models\{
    Category,
    Plan,
    Tenant,
};
use App\Observers\{
    CategoryObserver,
    TenantObservers,
    PlanObserver,
};
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
        //Tenant::observe(TenantObservers::class);
        Category::observe(CategoryObserver::class);
        Paginator::useBootstrap();
    }
}
