<?php

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface
{
    public function newEvaluationOrder(int $idOrder, int $idClient);
    public function getEvaluationByOrder(int $idOrder);
    public function newEvaluationByClient(int $idClient);
}
