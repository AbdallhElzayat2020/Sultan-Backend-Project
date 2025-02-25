<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Enums\Status;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(array $cols = ['*'], array $relations = [], bool $paginate = true)
    {
        $users = User::whereNot('id', 1)->filter()->select($cols)->orderByDesc('created_at');

        if (count($relations)) {
            $users = $users->with($relations);
        }

        if ($paginate) {
            return $users->paginate();
        }

        return $users->get();
    }

    public function getById(int $id, array $cols = ['*'])
    {
        return User::findOrFail($id, $cols);
    }

    public function create(array $data)
    {
        DB::transaction(function () use ($data) {
            $user = User::create($data);

            $user->assignRole($data['role']);
        });
    }

    public function update(User $user, array $data)
    {
        DB::transaction(function () use ($user, $data) {
            $user->update($data);

            $user->syncRoles($data['role']);
        });
    }

    public function delete(User $user)
    {
        if ($user->id === 1) {
            abort(403);
        }

        return $user->delete();
    }

    public function updateStatus(User $user, Status $status)
    {
        if ($user->id === 1) {
            abort(403);
        }

        $user->update([
            'status' => $status,
        ]);
    }
}
