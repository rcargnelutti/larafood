<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObservers;
use App\Tenant\Scopes\TenantScope;

trait TenantTrait
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::observe(TenantObservers ::class);

        static::addGlobalScope(new TenantScope);
    }
}
