<?php

namespace App\Providers;

use App\Models\{
    Category,
    Plan,
    Product,
    Tenant,
};
use App\Observers\{
    CategoryObserver,
    TenantObservers,
    PlanObserver,
    ProductObserver,
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
        Product::observe(ProductObserver::class);
        Paginator::useBootstrap();
    }
}
