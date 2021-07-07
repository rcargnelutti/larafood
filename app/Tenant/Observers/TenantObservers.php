<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class TenantObservers
{
    /**
     * Handle the Tenant "creating" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function creating(Model $model)
    {
        //dd($model);
        $managerTenant = app(ManagerTenant::class);
        $identify = $managerTenant->getTenantIdentify();

        if ($identify) {
            $model->tenant_id = $identify;
            $model->uuid = Str::uuid();
        }

    }
}
