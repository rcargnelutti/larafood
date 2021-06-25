<?php

namespace App\Services;

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    TenantRepositoryInterface,
};

class CategoryService
{
    protected $tenantRepository, $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, TenantRepositoryInterface $tenantRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getCategoriesById(string $id)
    {
        $tenant = $this->tenantRepository->getTenantById($id);

        return $this->categoryRepository->getCategoriesByTenantId2($tenant->id);
    }

}
