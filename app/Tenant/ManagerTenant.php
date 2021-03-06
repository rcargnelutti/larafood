<?php

namespace App\Tenant;

use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

Class ManagerTenant
{
    public function getTenantIdentify()
    {
        return Auth::check() ? Auth::user()->tenant_id : '';
    }

    public function getTenant()
    {
        return Auth::check() ? Auth::user()->tenant : ''; //Retorna o relacionamento de user com tenant
    }

    public function isAdmin(): bool
    {
        return in_array(Auth::user()->email, config('tenant.admins'));
    }

}
