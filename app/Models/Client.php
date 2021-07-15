<?php

namespace App\Models;

use App\Models\Evaluation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'tenant_id',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

}
