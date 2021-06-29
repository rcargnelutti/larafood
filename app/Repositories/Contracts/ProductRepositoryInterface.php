<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getProductsByTenantId(string $idTenant);
    //public function getProductById(string $id);
}
