<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details()
    {
        return $this->hasMany(DetailPlan::class); //hasMany = 1 para muitos
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function search($filter = null)
    {
        return $this->where('name', 'LIKE', "%{$filter}%")
                    ->orWhere('description', 'LIKE', "%{$filter}%")
                    ->paginate(5);
    }

    /**
     * Profiles not linked with this plan
     */
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIN('profiles.id', function($query){
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->where(function($queryFilter) use($filter){
            if ($filter)
                $queryFilter->where('permissions.name', 'LIKE', "%$filter%");
        })
        ->paginate();
        //->toSql();
        //dd($permissions);

        return $profiles;
    }
}
