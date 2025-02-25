<?php

namespace App\Contracts\Repositories;

use App\Models\Offer;

interface OfferRepositoryInterface
{
    public function getAll(array $cols = ['*'], array $relations = [], bool $paginate = true);

    public function getById(int $id, array $cols = ['*']);

    public function create(array $data);

    public function update(Offer $offer, array $data);

    public function delete(Offer $offer);
}
