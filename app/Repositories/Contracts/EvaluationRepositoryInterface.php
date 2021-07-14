<?php

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface
{
    public function newEvaluationOrder(int $idOrder, int $idClient, array $evaluation);
    public function getEvaluationByOrder(int $idOrder);
    public function newEvaluationByClient(int $idClient);
    public function newEvaluationByClientIdByOrderId(int $idOrder, int $idClient);
}
