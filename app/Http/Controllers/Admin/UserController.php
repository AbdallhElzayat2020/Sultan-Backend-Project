<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\RoleRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private RoleRepositoryInterface $roleRepository
    ) {
        $this->middleware('can:delete-users')->only(['destroy']);
        $this->middleware('can:create-users')->only(['create', 'store']);
        $this->middleware('can:view-users')->only(['index', 'show']);
        $this->middleware('can:update-users')->only(['edit', 'update']);
    }

    public function index()
    {
        $users = $this->userRepository->getAll();

        return view('dashboard.pages.users.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->roleRepository->getAll(paginate: false);

        return view('dashboard.pages.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $this->userRepository->create($request->validated());

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.users.index');
    }

    public function show(User $user) {}

    public function edit(User $user)
    {
        abort_unless($user->id !== 1, 403);

        $roles = $this->roleRepository->getAll(paginate: false);

        $userRole = $user->roles()->first();

        return view('dashboard.pages.users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        abort_unless($user->id !== 1, 403);

        try {
            $this->userRepository->update($user, $request->validated());

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.users.index');
    }

    public function destroy(User $user)
    {
        abort_unless($user->id !== 1, 403);

        $this->userRepository->delete($user);

        return to_route('admin.users.index');
    }

    public function updateStatus(User $user)
    {
        abort_unless($user->id !== 1, 403);

        try {
            $status = $user->status->is(Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;
            $this->userRepository->updateStatus($user, $status);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.users.index');
    }
}
