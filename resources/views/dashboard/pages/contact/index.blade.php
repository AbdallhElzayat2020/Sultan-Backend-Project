@extends('dashboard.layouts.master')
@section('title', 'رسايل التواصل')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            رسائل التواصل
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex align-items-center justify-content-between">
                    {{-- seacrh form and filter status --}}
                    <form action="{{ URL::current() }}" method="get" class="my-4 flex flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center gap-2 col-6">
                            <input type="text" name="c_s" class="form-control mx-2" placeholder="بحث"
                                   value="{{ request('c_s') }}">
                            <select name="ser" class="form-control mx-2">
                                @foreach($services as $service)
                                    <option value="">الكل</option>
                                    <option
                                        value="{{ $service->id }}" @selected(request('ser') == $service->id)>{{ $service->title }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mx-2">بحث</button>
                        </div>
                    </form>
                    {{-- seacrh form and filter status --}}
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم العميل</th>
                        <th>رقم الهاتف</th>
                        <th>الخدمة المطلوبة</th>
                        <th>نوع العقار</th>
                        <th>الرساله</th>
                        <th>تاريخ الإنشاء</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $counter = paginate_counter();
                    ?>
                    @forelse($contacts as $contact)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td class="text-wrap">
                                {{ $contact->name }}
                            </td>
                            <td class="text-wrap">
                                {{ $contact->phone }}
                            </td>
                            <td class="text-wrap">
                                {{ $contact->service->title }}
                            </td>
                            <td class="text-wrap">
                                {{ $contact->offer_type }}
                            </td>
                            <td class="text-wrap">
                                {{ $contact->message }}
                            </td>
                            <td class="text-wrap">
                                {{ $contact->created_at->diffForHumans() }}
                            </td>
                            <td class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @can('delete-contacts')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $contact->id }}">
                                        حذف
                                    </button>
                                @endcan
                            </td>
                        </tr>
                        @include('dashboard.layouts.delete-modal',
                            [
                                'route' => route('admin.contacts.destroy', $contact),
                                'title' => $contact->name,
                                'model' => $contact
                            ])
                    @empty
                        <tr class="text-center">
                            <td colspan="8">لا يوجد بيانات لعرضها</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
