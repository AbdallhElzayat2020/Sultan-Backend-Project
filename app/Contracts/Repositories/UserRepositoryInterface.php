<?php

namespace App\Contracts\Repositories;

use App\Enums\Status;
use App\Models\User;

interface UserRepositoryInterface
{
    public function getAll(array $cols = ['*'], array $relations = [], bool $paginate = true);

    public function getById(int $id, array $cols = ['*']);

    public function create(array $data);

    public function update(User $user, array $data);

    public function delete(User $user);

    public function updateStatus(User $user, Status $status);
}
