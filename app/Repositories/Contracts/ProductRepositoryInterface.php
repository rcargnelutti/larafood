<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getProductsByTenantId(string $idTenant, array $categories);
    //public function getProductById(string $id);
}
