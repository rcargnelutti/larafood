<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{
    // public function permissions(): array
    // {
    //     $tenant = $this->tenant;
    //     //dd($tenant);
    //     $plan = $tenant->plan;
    //     //dd($plan);

    //     $permissions = [];
    //     foreach ($plan->profiles as $profile) {
    //         foreach ($profile->permissions as $permission) {
    //             array_push($permissions, $permission->name);
    //         }
    //     }
    //     return $permissions;
    // }

    public function permissions(): array
    {
        //dd($this->permissionsPlan());
        $permissionsPlan = $this->permissionsPlan();
        //dd($this->permissionsRole());
        $permissionsRole = $this->permissionsRole();

        $permissions = [];
        foreach ($permissionsRole as $permission) {
            if (in_array($permission, $permissionsPlan))
                array_push($permissions, $permission);
        }
        //dd($permissions);
        return $permissions;
    }

    public function permissionsPlan(): array
    {
        // $tenant = $this->tenant;
        // $plan = $tenant->plan;
        $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
        $plan = $tenant->plan;

        $permissions = [];
        foreach ($plan->profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }
        return $permissions;
    }

    public function permissionsRole(): array
    {
        $roles = $this->roles()->with('permissions')->get();
        //dd($roles);
        $permissions = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    public function isTenant(): bool
    {
        return !in_array($this->email, config('acl.admins'));
    }
}
