<?php

namespace App\Contracts\Repositories;

use App\Models\Opportunity;

interface OpportunityRepositoryInterface
{
    public function getAll(array $cols = ['*'], bool $paginate = true);

    public function getById(int $id, array $cols = ['*']);

    public function create(array $data);

    public function update(Opportunity $opportunityRequest, array $data);

    public function delete(Opportunity $opportunityRequest);
}
