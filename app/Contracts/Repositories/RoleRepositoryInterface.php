<?php

namespace App\Contracts\Repositories;

use Spatie\Permission\Models\Role;

interface RoleRepositoryInterface
{
    public function getAll(array $cols = ['*'], array $relations = [], bool $paginate = true);

    public function getById(int $id, array $cols = ['*']);

    public function create(array $data);

    public function update(Role $role, array $data);

    public function delete(Role $role);
}
