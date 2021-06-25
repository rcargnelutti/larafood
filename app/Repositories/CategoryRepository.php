<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $entity;

    public function __construct(Category $category)
    {
        $this->entity = $category;
    }

    public function getCategoriesByTenantId(string $id)
    {
        return $this->entity
                ->join('tenants', 'tenants.id', '=', 'categories.tenant.id')
                ->where('tenant.id', $id)
                ->select('categories.*')
                ->get();
    }

    public function getCategoriesByTenantId2(int $idTenant)
    {
        return $this->entity->where('tenant_id', $idTenant)->get();
    }
}
