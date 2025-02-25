<?php

namespace App\Contracts\Repositories;

use App\Models\Contact;

interface ContactRepositoryInterface
{
    public function getAll(array $cols = ['*'], array $relations = [], bool $paginate = true);

    public function getById(int $id, array $cols = ['*']);

    public function create(array $data);

    public function update(Contact $contactInquiry, array $data);

    public function delete(Contact $contactInquiry);
}
