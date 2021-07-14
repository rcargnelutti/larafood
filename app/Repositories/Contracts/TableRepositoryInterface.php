<?php

namespace App\Repositories\Contracts;
interface TableRepositoryInterface
{
    public function getTablesByTenantId(string $id);
    public function getTablesByTenantId2(int $idTenant);
    public function getTableByUuid(string $identify);
}
