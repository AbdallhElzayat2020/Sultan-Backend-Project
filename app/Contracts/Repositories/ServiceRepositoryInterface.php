<?php

namespace App\Contracts\Repositories;

use App\Models\Service;

interface ServiceRepositoryInterface
{
    public function getAll(array $cols = ['*'], bool $paginate = true);

    public function getAllWithFeatures();

    public function getById(int $id, array $cols = ['*']);

    public function create(array $data);

    public function update(Service $service, array $data);

    public function delete(Service $service);
}
