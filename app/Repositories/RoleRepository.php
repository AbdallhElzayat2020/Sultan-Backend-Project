<?php

namespace App\Repositories;

use App\Contracts\Repositories\RoleRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function getAll(array $cols = ['*'], array $relations = [], bool $paginate = true)
    {
        $roles = Role::whereNot('id', 1)->select($cols)->orderByDesc('created_at');

        if (count($relations)) {
            $roles = $roles->with($relations);
        }

        if ($paginate) {
            return $roles->paginate();
        }

        return $roles->get();
    }

    public function getById(int $id, array $cols = ['*'])
    {
        return Role::findOrFail($id, $cols);
    }

    public function create(array $data)
    {
        DB::transaction(function () use ($data) {
            $data['name'] = Str::slug($data['display_name']);

            $role = Role::create($data);

            $role->permissions()->attach($data['permissions']);
        });
    }

    public function update(Role $role, array $data)
    {
        DB::transaction(function () use ($data, $role) {
            $data['name'] = Str::slug($data['display_name']);

            $role->update($data);

            $role->permissions()->sync($data['permissions']);
        });
    }

    public function delete(Role $role)
    {
        return $role->delete();
    }
}
