@extends('dashboard.layouts.master')
@section('title', 'المستخدمين')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            المستخدمين
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex align-items-center justify-content-between">
                    <form action="{{ URL::current() }}" method="get" class="my-4 flex flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center gap-2 col-6">
                            <input type="text" name="u_s" class="form-control mx-2" placeholder="بحث"
                                   value="{{ request('u_s') }}">
                            <select name="u_status" class="form-control mx-2" id="">
                                <option value="">الكل</option>
                                <option
                                    value="active" @selected(request('u_status') === \App\Enums\Status::ACTIVE->value)>
                                    مفعل
                                </option>
                                <option
                                    value="inactive" @selected(request('u_status') === \App\Enums\Status::INACTIVE->value)>
                                    غير مفعل
                                </option>
                            </select>
                            <button type="submit" class="btn btn-primary mx-2">بحث</button>
                        </div>
                    </form>
                    @can('create-users')
                        <a href="{{route('admin.users.create')}}" class="btn btn-primary mb-4">اضافة جديد</a>
                    @endcan
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم العميل</th>
                        <th>البريد</th>
                        <th>حاله الحساب</th>
                        <th>تاريخ الإنشاء</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $counter = paginate_counter();
                        ?>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                {{ $counter++ }}
                            </td>
                            <td>
                                <strong>{{ $user->name }}</strong>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span
                                    class="badge {{ $user->status->style() }} me-1">{{ $user->status->label() }}</span>
                            </td>
                            <td>
                                {{ $user->created_at->diffForHumans() }}
                            </td>
                            <td class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @can('update-users')
                                    <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary">تعديل</a>
                                @endcan
                                @can('delete-users')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $user->id }}">
                                        حذف
                                    </button>
                                @endcan
                                @can('update-users')
                                    <form action="{{ route('admin.users.update-status', $user) }}" method="post"
                                          class="d-flex">
                                        @csrf
                                        @if($user->status->is(\App\Enums\Status::ACTIVE))
                                            <button class="btn btn-warning">إيقاف</button>
                                        @else
                                            <button class="btn btn-warning">تفعيل</button>
                                        @endif
                                    </form>
                                @endcan
                            </td>
                        </tr>
                        @include('dashboard.layouts.delete-modal',
                                [
                                    'model' => $user,
                                    'title'=> $user->name,
                                    'route' => route('admin.users.destroy', $user)
                                ])
                    @empty
                        <tr class="text-center">
                            <td colspan="8">لا يوجد بيانات لعرضها</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
