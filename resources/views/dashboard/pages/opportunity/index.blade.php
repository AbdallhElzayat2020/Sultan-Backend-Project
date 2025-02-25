@extends('dashboard.layouts.master')
@section('title', 'الفرص')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            الفرص
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex align-items-center justify-content-between">
                    <form action="{{ URL::current() }}" method="get" class="my-4 flex flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center gap-2 col-6">
                            <input type="text" name="op_s" class="form-control mx-2" placeholder="بحث"
                                   value="{{ request('op_s') }}">
                            <select name="op_type" class="form-control mx-2" id="">
                                <option value="">الكل</option>
                                @foreach(\App\Enums\OpportunityType::cases() as $opportunity)
                                    <option
                                        value="{{ $opportunity->value }}" @selected(request('op_type') === $opportunity->value)>{{ $opportunity->label() }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mx-2">بحث</button>
                        </div>
                    </form>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>البريد</th>
                        <th>الهاتف</th>
                        <th>المؤهل</th>
                        <th>النوع</th>
                        <th>عدد سنوات الخبره</th>
                        <th>مجال الخبره</th>
                        <th>المسمي الوظيفي</th>
                        <th>الرساله</th>
                        <th>تاريخ الإنشاء</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $counter = paginate_counter();
                    ?>
                    @forelse($opportunities as $opportunity)
                        <tr>
                            <td class="text-wrap">
                                {{ $counter++ }}
                            </td>
                            <td class="text-wrap">
                                <strong>{{ $opportunity->name }}</strong>
                            </td>
                            <td class="text-wrap">{{ $opportunity->email }}</td>
                            <td class="text-wrap">{{ $opportunity->phone }}</td>
                            <td class="text-wrap">{{ $opportunity->education }}</td>
                            <td class="text-wrap">
                                {{ $opportunity->type->label() }}
                            </td>
                            <td class="text-wrap">{{ $opportunity->years_of_exp }}</td>
                            <td class="text-wrap">{{ $opportunity->field_of_exp }}</td>
                            <td class="text-wrap">{{ $opportunity->job_title }}</td>
                            <td class="text-wrap" style="max-width: 500px">{{ $opportunity->note }}</td>
                            <td class="text-wrap">
                                {{ $opportunity->created_at->diffForHumans() }}
                            </td>
                            <td class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @can('delete-opportunities')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $opportunity->id }}">
                                        حذف
                                    </button>
                                @endcan
                            </td>
                        </tr>
                        @include('dashboard.layouts.delete-modal',
                                [
                                    'model' => $opportunity,
                                    'title'=> $opportunity->name,
                                    'route' => route('admin.opportunities.destroy', $opportunity)
                                ])
                    @empty
                        <tr class="text-center">
                            <td colspan="6">لا يوجد بيانات لعرضها</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $opportunities->links() }}
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
