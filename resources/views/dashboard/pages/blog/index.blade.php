@extends('dashboard.layouts.master')
@section('title', 'المدونات الالكترونية')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            المدونات الالكترونية
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex align-items-center justify-content-between">
                    {{-- seacrh form and filter status --}}
                    <form action="{{ URL::current() }}" method="get" class="my-4 flex flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center gap-2 col-6">
                            <input type="text" name="b_s" class="form-control mx-2" placeholder="بحث"
                                   value="{{ request('b_s') }}">
                            <select name="b_status" class="form-control mx-2" id="">
                                <option value="">الكل</option>
                                <option
                                    value="active" @selected(request('b_status') === \App\Enums\Status::ACTIVE->value)>
                                    مفعل
                                </option>
                                <option
                                    value="inactive" @selected(request('b_status') === \App\Enums\Status::INACTIVE->value)>
                                    غير مفعل
                                </option>
                            </select>
                            <button type="submit" class="btn btn-primary mx-2">بحث</button>
                        </div>
                    </form>
                    {{-- seacrh form and filter status --}}
                    @can('create-blogs')
                        <a href="{{route('admin.blogs.create')}}" class="btn btn-primary mb-4">اضافة جديد</a>
                    @endcan
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان المدونة</th>
                        <th>دونت بواسطة</th>
                        <th>الحالة</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $counter = paginate_counter();
                        ?>
                    @forelse($blogs as $blog)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>
                                <strong>{{ $blog->title }}</strong>
                            </td>
                            <td>{{ $blog->author->name }}</td>
                            <td><span
                                    class="badge {{ $blog->status->style() }} me-1">{{ $blog->status->label() }}</span>
                            </td>
                            <td class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @can('update-blogs')
                                    <a href="{{route('admin.blogs.edit', $blog)}}" class="btn btn-primary">تعديل</a>
                                @endcan
                                @can('delete-blogs')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $blog->id }}">
                                        حذف
                                    </button>
                                @endcan
                                @can('update-blogs')
                                    <form action="{{ route('admin.blogs.update-status', $blog) }}" method="post"
                                          class="d-flex">
                                        @csrf
                                        @if($blog->status->is(\App\Enums\Status::ACTIVE))
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
                                'route' => route('admin.blogs.destroy', $blog),
                                'title' => $blog->title,
                               'model' => $blog
                            ])
                    @empty
                        <tr class="text-center">
                            <td colspan="4">لا يوجد بيانات لعرضها</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
