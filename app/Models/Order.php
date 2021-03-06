<?php

namespace App\Models;

use App\Models\Evaluation;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use TenantTrait;

    protected $fillable = ['tenant_id', 'identify', 'client_id', 'table_id', 'total', 'status', 'comment'];

    /**
     * Options status
     */
    public $statusOptions = [
        'open' => 'Aberto',
        'done' => 'Completo',
        'rejected' => 'Rejeitado',
        'working' => 'Andamento',
        'canceled' => 'Cancelado',
        'delivering' => 'Em transito',
    ];

    public function tenant()
    {
        return $this->BelongsTo(Tenant::class);
    }

    public function client()
    {
        return $this->BelongsTo(Client::class);
    }

    public function table()
    {
        return $this->BelongsTo(Table::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'price');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

}
