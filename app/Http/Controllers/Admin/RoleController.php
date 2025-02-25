<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\PermissionRepositoryInterface;
use App\Contracts\Repositories\RoleRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct(
        private RoleRepositoryInterface $roleRepository,
        private PermissionRepositoryInterface $permissionRepository
    ) {
        $this->middleware('can:update-roles')->only(['edit', 'update']);
        $this->middleware('can:delete-roles')->only(['destroy']);
        $this->middleware('can:create-roles')->only(['create', 'store']);
        $this->middleware('can:view-roles')->only(['index', 'show']);
    }

    public function index()
    {
        $roles = $this->roleRepository->getAll();

        return view('dashboard.pages.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = $this->permissionRepository->getAll();

        return view('dashboard.pages.roles.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        try {
            $this->roleRepository->create($request->validated());

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.roles.index');
    }

    public function show(Role $role) {}

    public function edit(Role $role)
    {
        abort_unless($role->id !== 1, 403);

        $role->load('permissions');

        $rolePermissions = $role->permissions->pluck('id')->toArray();

        $permissions = $this->permissionRepository->getAll();

        return view('dashboard.pages.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        abort_unless($role->id !== 1, 403);

        try {
            $this->roleRepository->update($role, $request->validated());

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        abort_unless($role->id !== 1, 403);

        try {
            $this->roleRepository->delete($role);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.roles.index');
    }
}
