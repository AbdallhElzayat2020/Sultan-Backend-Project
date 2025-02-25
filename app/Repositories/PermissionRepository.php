<?php

namespace App\Repositories;

use App\Contracts\Repositories\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function getAll(array $cols = ['*'])
    {
        return Permission::select($cols)->get();
    }

    public function getById(int $id, array $cols = ['*'])
    {
        return Permission::findOrFail($id, $cols);
    }
}
