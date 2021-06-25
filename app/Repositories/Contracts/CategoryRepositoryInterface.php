<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getCategoriesByTenantId(string $id);
    public function getCategoriesByTenantId2(int $idTenant);
}
