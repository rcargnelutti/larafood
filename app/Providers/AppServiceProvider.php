<?php

namespace App\Providers;

use App\Models\{
    Category,
    Client,
    Plan,
    Product,
    Table,
    Tenant,
};
use App\Observers\{
    CategoryObserver,
    ClientObserver,
    TenantObservers,
    PlanObserver,
    ProductObserver,
    TableObserver,
};
use App\Repositories\Contracts\TenantRepositoryInterface;
use App\Repositories\TenantRepository;
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
        // $this->app->bind(
        //     TenantRepositoryInterface::class,
        //     TenantRepository::class,
        // );
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
        Table::observe(TableObserver::class);
        Client::observe(ClientObserver::class);
    }
}
