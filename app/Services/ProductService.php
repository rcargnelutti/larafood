<?php

namespace App\Services;

use App\Repositories\Contracts\{
    ProductRepositoryInterface,
    TenantRepositoryInterface,
};

class ProductService
{
    protected $productService, $tenantRepository;

    public function __construct(ProductRepositoryInterface $productService, TenantRepositoryInterface $tenantRepository)
    {
        $this->productService = $productService;
        $this->tenantRepository = $tenantRepository;
    }

    public function getProductsByTenantUuid(string $id)
    {
        $tenant = $this->tenantRepository->getTenantById($id);

        return $this->productService->getProductsByTenantId($tenant);
    }

}
