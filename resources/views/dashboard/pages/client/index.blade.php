@extends('dashboard.layouts.master')
@section('title', 'العملاء')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            العملاء
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex align-items-center justify-content-end">
                    @can('create-clients')
                        <a href="{{route('admin.clients.create')}}" class="btn btn-primary mb-4">اضافة جديد</a>
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
                    @forelse($clients as $client)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>
                                {{ $client->name }}
                            </td>
                            <td><span
                                        class="badge {{ $client->status->style() }} me-1">{{ $client->status->label() }}</span>
                            </td>
                            <td>
                                {{ $client->created_at->diffForHumans() }}
                            </td>
                            <td class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                @can('update-clients')
                                    <a href="{{route('admin.clients.edit', $client)}}"
                                       class="btn btn-primary">تعديل</a>
                                @endcan
                                @can('delete-clients')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $client->id }}">
                                        حذف
                                    </button>
                                @endcan
                                @can('update-clients')
                                    <form action="{{ route('admin.clients.update-status', $client) }}" method="post"
                                          class="d-flex">
                                        @csrf
                                        @if($client->status->is(\App\Enums\Status::ACTIVE))
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
                                'route' => route('admin.clients.destroy', $client),
                                'title' => $client->name,
                                'model' => $client
                            ])
                    @empty
                        <tr class="text-center">
                            <td colspan="5">لا يوجد بيانات لعرضها</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
