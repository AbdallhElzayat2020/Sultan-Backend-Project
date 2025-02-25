<?php

namespace App\Repositories;

use App\Contracts\Repositories\OpportunityRepositoryInterface;
use App\Models\Opportunity;

class OpportunityRepository implements OpportunityRepositoryInterface
{
    public function getAll(array $cols = ['*'], bool $paginate = true)
    {
        $opportunities = Opportunity::filter()->select($cols)->latest();

        if ($paginate) {
            return $opportunities->paginate();
        }

        return $opportunities->get();
    }

    public function getById(int $id, array $cols = ['*'])
    {
        return Opportunity::findOrFail($id, $cols);
    }

    public function create(array $data)
    {
        return Opportunity::create($data);
    }

    public function update(Opportunity $opportunityRequest, array $data)
    {
        return $opportunityRequest->update($data);
    }

    public function delete(Opportunity $opportunityRequest)
    {
        return $opportunityRequest->delete();
    }
}
