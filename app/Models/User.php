<?php

namespace App\Models;

use App\Models\Traits\UserACLTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UserACLTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tenant_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTenantUser(Builder $query)
    {
        return $query->where('tenant_id', Auth::user()->tenant_id);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class); // relacionamento de n para 1
    }

    /**
     * Get Roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Role not linked with this user
     */
    public function rolesAvailable($filter = null)
    {
        $roles = Role::whereNotIN('roles.id', function($query){
            $query->select('role_user.role_id');
            $query->from('role_user');
            $query->whereRaw("role_user.user_id={$this->id}");
        })// where para o filtro
        ->where(function($queryFilter) use($filter){
            if ($filter)
                $queryFilter->where('roles.name', 'LIKE', "%$filter%");
        })
        ->paginate();
        //->toSql();
        //dd($roles);

        return $roles;
    }
}
