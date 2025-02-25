@extends('dashboard.layouts.master')
@section('title', 'Blogs Page')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            المدونات الالكترونية
        </h4>
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <div class="d-flex align-items-center justify-content-between">
                    <form action="{{ URL::current() }}" method="get" class="my-4">
                        <div class="d-flex justify-content-between align-items-center gap-2">
                            <input type="text" name="search" class="form-control mx-2" placeholder="Search" >
                            <select name="status" class="form-control mx-2" id="">
                                <option value="">All</option>
                                <option value="active" @selected(request('status') == 'active')>Active</option>
                                <option value="archived" @selected(request('status') == 'archived')>Archived</option>
                            </select>
                            <button type="submit" class="btn btn-primary mx-2">Search</button>
                        </div>
                    </form>
                    <a href="{{route('admin.blogs.create')}}" class="btn btn-primary mb-4">اضافة جديد</a>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Project</th>
                        <th>Client</th>
                        <th>Users</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($blogs as $blog)
                        <tr>
                            <td>
                                <i class="ti ti-brand-angular ti-lg text-danger me-3"></i>
                                <strong>Angular Project</strong>
                            </td>
                            <td>Albert Cook</td>
                            <td>
                                test
                            </td>
                            <td><span class="badge bg-label-primary me-1">Active</span></td>
                            <td>
                                <a href="{{route('admin.blogs.edit')}}" class="btn btn-primary">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $blog->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @include('dashboard.pages.blog.delete')
                    @empty
                        <tr class="text-center">
                            <td colspan="8">No Data Available</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
