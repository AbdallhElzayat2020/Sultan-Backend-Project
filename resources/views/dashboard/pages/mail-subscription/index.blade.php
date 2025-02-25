@extends('dashboard.layouts.master')
@section('title', 'الاشتراكات بالبريد الالكتروني')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            الاشتراكات بالبريد الالكتروني
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex align-items-center justify-content-between">
                    <form action="{{ URL::current() }}" method="get" class="my-4 flex flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center gap-2 col-4">
                            <input type="text" name="ms_s" class="form-control mx-2" placeholder="بحث"
                                   value="{{ request('ms_s') }}">
                            <button type="submit" class="btn btn-primary mx-2">بحث</button>
                        </div>
                    </form>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>البريد الالكتروني</th>
                        <th>تاريخ الإنشاء</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $counter = paginate_counter();
                    ?>
                    @forelse($mail_subscriptions as $mail_subscription)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $mail_subscription->email }}</td>
                            <td>{{ $mail_subscription->created_at->diffForHumans() }}</td>
                            <td class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @can('delete-mail-subscriptions')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $mail_subscription->id }}">
                                        حذف
                                    </button>
                                @endcan
                            </td>
                        </tr>
                        @include('dashboard.layouts.delete-modal', [
                                'title' => $mail_subscription->email,
                                'model' => $mail_subscription,
                                'route' => route('admin.mail-subscriptions.destroy', $mail_subscription)
                                ])
                    @empty
                        <tr class="text-center">
                            <td colspan="8">لا يوجد بيانات لعرضها</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $mail_subscriptions->links() }}
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
