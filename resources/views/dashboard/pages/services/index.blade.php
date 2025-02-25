@extends('dashboard.layouts.master')
@section('title', 'الخدمات')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            الخدمات
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex align-items-center justify-content-between">
                    <form action="{{ URL::current() }}" method="get" class="my-4 flex flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center gap-2 col-6">
                            <input type="text" name="s_s" class="form-control mx-2" placeholder="بحث"
                                   value="{{ request('s_s') }}">
                            <button type="submit" class="btn btn-primary mx-2">بحث</button>
                        </div>
                    </form>
                    @can('create-services')
                        <a href="{{route('admin.services.create')}}" class="btn btn-primary mb-4">اضافة جديد</a>
                    @endcan
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الخدمه</th>
                        <th>الحاله</th>
                        <th>تاريخ الإنشاء</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $counter = paginate_counter();
                        ?>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>
                                {{ $service->title }}
                            </td>
                            <td><span
                                    class="badge {{ $service->status->style() }} me-1">{{ $service->status->label() }}</span>
                            </td>
                            <td>
                                {{ $service->created_at->diffForHumans() }}
                            </td>
                            <td class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @can('update-services')
                                    <a href="{{route('admin.services.edit', $service)}}"
                                       class="btn btn-primary">تعديل</a>
                                @endcan
                                @can('delete-services')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $service->id }}">
                                        حذف
                                    </button>
                                @endcan
                                @can('update-services')
                                    <form action="{{ route('admin.services.update-status', $service) }}" method="post"
                                          class="d-flex">
                                        @csrf
                                        @if($service->status->is(\App\Enums\Status::ACTIVE))
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
                                'route' => route('admin.services.destroy', $service),
                                'title' => $service->title,
                                'model' => $service
                            ])
                    @empty
                        <tr class="text-center">
                            <td colspan="8">لا يوجد بيانات لعرضها</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
