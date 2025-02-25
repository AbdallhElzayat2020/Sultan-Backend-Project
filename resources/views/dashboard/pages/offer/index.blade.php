@extends('dashboard.layouts.master')
@section('title', 'العروض العقاريه')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            العروض العقاريه
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex align-items-center justify-content-between">
                    {{-- seacrh form and filter status --}}
                    <form action="{{ URL::current() }}" method="get" class="my-4 flex flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center gap-2 col-6">
                            <input type="text" name="o_s" class="form-control mx-2" placeholder="بحث"
                                   value="{{ request('o_s') }}">
                            <select name="o_status" class="form-control mx-2" id="">
                                <option value="">الكل</option>
                                <option
                                    value="active" @selected(request('o_status') === \App\Enums\Status::ACTIVE->value)>
                                    مفعل
                                </option>
                                <option
                                    value="inactive" @selected(request('o_status') === \App\Enums\Status::INACTIVE->value)>
                                    غير مفعل
                                </option>
                            </select>
                            <button type="submit" class="btn btn-primary mx-2">بحث</button>
                        </div>
                    </form>
                    @can('create-offers')
                        <a href="{{route('admin.offers.create')}}" class="btn btn-primary mb-4">اضافة جديد</a>
                    @endcan
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان العرض</th>
                        <th>النوع</th>
                        <th>السعر</th>
                        <th>المكان</th>
                        <th>الحالة</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $counter = paginate_counter();
                        ?>
                    @forelse($offers as $offer)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>
                                <strong class="text-start">{!! $offer->short_title !!}</strong>
                            </td>
                            <td>{{ $offer->property_type->value }}</td>
                            <td>{{ $offer->price }}</td>
                            <td>{{ $offer->location->value }}</td>
                            <td>
                                <span
                                    class="badge {{ $offer->status->style() }} me-1">{{ $offer->status->label() }}</span>
                            </td>
                            <td class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @can('update-offers')
                                    <a href="{{route('admin.offers.edit', $offer)}}" class="btn btn-primary">تعديل</a>
                                @endcan
                                @can('delete-offers')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $offer->id }}">
                                        حذف
                                    </button>
                                @endcan
                                @can('update-offers')
                                    <form action="{{ route('admin.offers.update-status', $offer) }}" method="post"
                                          class="d-flex">
                                        @csrf
                                        @if($offer->status->is(\App\Enums\Status::ACTIVE))
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
                                            'route' => route('admin.offers.destroy', $offer),
                                            'title' => 'عقار',
                                            'model' => $offer
                                        ])
                    @empty
                        <tr class="text-center">
                            <td colspan="7">لا يوجد بيانات لعرضها</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $offers->links() }}
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
