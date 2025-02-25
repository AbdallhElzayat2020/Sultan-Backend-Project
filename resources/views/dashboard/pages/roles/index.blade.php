@extends('dashboard.layouts.master')
@section('title', 'الادوار')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            الادوار
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex justify-content-end">
                    @can('create-roles')
                        <a href="{{route('admin.roles.create')}}" class="btn btn-primary mb-4">اضافة جديد</a>
                    @endcan
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>تاريخ الإنشاء</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $counter = paginate_counter();
                        ?>
                    @forelse($roles as $role)
                        <tr>
                            <td>
                                {{ $counter++ }}
                            </td>
                            <td>
                                <strong>{{ $role->display_name }}</strong>
                            </td>
                            <td>
                                {{ $role->created_at->diffForHumans() }}
                            </td>
                            <td class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @can('update-roles')
                                    <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary">تعديل</a>
                                @endcan
                                @can('delete-roles')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $role->id }}">
                                        حذف
                                    </button>
                                @endcan
                            </td>
                        </tr>
                        @include('dashboard.layouts.delete-modal',
                                [
                                    'model' => $role,
                                    'title'=> $role->name,
                                    'route' => route('admin.roles.destroy', $role)
                                ])
                    @empty
                        <tr class="text-center">
                            <td colspan="4">لا يوجد بيانات لعرضها</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
