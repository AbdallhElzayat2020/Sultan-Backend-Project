@extends('dashboard.layouts.master')
@section('title', 'اراء العملاء')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            اراء العملاء
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex align-items-center justify-content-between">
                    <form action="{{ URL::current() }}" method="get" class="my-4 flex flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center gap-2 col-6">
                            <input type="text" name="t_s" class="form-control mx-2" placeholder="بحث"
                                   value="{{ request('t_s') }}">
                            <select name="t_status" class="form-control mx-2" id="">
                                <option value="">الكل</option>
                                <option
                                    value="active" @selected(request('t_status') === \App\Enums\Status::ACTIVE->value)>
                                    مفعل
                                </option>
                                <option
                                    value="inactive" @selected(request('t_status') === \App\Enums\Status::INACTIVE->value)>
                                    غير مفعل
                                </option>
                            </select>
                            <button type="submit" class="btn btn-primary mx-2">بحث</button>
                        </div>
                    </form>
                    @can('create-testimonials')
                        <a href="{{route('admin.testimonials.create')}}" class="btn btn-primary mb-4">اضافة جديد</a>
                    @endcan
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم العميل</th>
                        <th>وظيفة العميل</th>
                        <th>الحالة</th>
                        <th>تاريخ الإنشاء</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $counter = paginate_counter();
                        ?>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td>
                                {{ $counter++ }}
                            </td>
                            <td>
                                <strong>{{ $testimonial->client_name }}</strong>
                            </td>
                            <td>{{ $testimonial->job_title }}</td>
                            <td>
                                <span
                                    class="badge {{ $testimonial->status->style() }} me-1">{{ $testimonial->status->label() }}</span>
                            </td>
                            <td>
                                {{ $testimonial->created_at->diffForHumans() }}
                            </td>
                            <td class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @can('update-testimonials')
                                    <a href="{{route('admin.testimonials.edit', $testimonial)}}"
                                       class="btn btn-primary">تعديل</a>
                                @endcan
                                @can('delete-testimonials')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $testimonial->id }}">
                                        حذف
                                    </button>
                                @endcan
                                @can('update-testimonials')
                                    <form action="{{ route('admin.testimonials.update-status', $testimonial) }}"
                                          method="post"
                                          class="d-flex">
                                        @csrf
                                        @if($testimonial->status->is(\App\Enums\Status::ACTIVE))
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
                                    'model' => $testimonial,
                                    'title'=> $testimonial->client_name,
                                    'route' => route('admin.testimonials.destroy', $testimonial)
                                ])
                    @empty
                        <tr class="text-center">
                            <td colspan="8">لا يوجد بيانات لعرضها</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $testimonials->links() }}
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
