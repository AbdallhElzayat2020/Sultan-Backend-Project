@extends('dashboard.layouts.master')
@section('title', 'الشركاء')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            الشركاء
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex align-items-center justify-content-end">
                    @can('create-partners')
                        <a href="{{route('admin.partners.create')}}" class="btn btn-primary mb-4">اضافة جديد</a>
                    @endcan
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>الحاله</th>
                        <th>تاريخ الإنشاء</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $counter = paginate_counter();
                        ?>
                    @forelse($partners as $partner)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>
                                {{ $partner->name }}
                            </td>
                            <td><span
                                    class="badge {{ $partner->status->style() }} me-1">{{ $partner->status->label() }}</span>
                            </td>
                            <td>
                                {{ $partner->created_at->diffForHumans() }}
                            </td>
                            <td class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @can('update-partners')
                                    <a href="{{route('admin.partners.edit', $partner)}}"
                                       class="btn btn-primary">تعديل</a>
                                @endcan
                                @can('delete-partners')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $partner->id }}">
                                        حذف
                                    </button>
                                @endcan
                                @can('update-partners')
                                    <form action="{{ route('admin.partners.update-status', $partner) }}" method="post"
                                          class="d-flex">
                                        @csrf
                                        @if($partner->status->is(\App\Enums\Status::ACTIVE))
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
                                'route' => route('admin.partners.destroy', $partner),
                                'title' => $partner->name,
                                'model' => $partner
                            ])
                    @empty
                        <tr class="text-center">
                            <td colspan="5">لا يوجد بيانات لعرضها</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $partners->links() }}
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
