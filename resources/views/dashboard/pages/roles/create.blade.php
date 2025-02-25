@extends('dashboard.layouts.master')
@section('title', 'إنشاء الدور')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            إنشاء الدور
        </h4>
        @if($errors->any())
            <div class="alert alert-danger mt-2" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Basic Bootstrap Table -->
        <div class="card p-3">
            <form method="post" action="{{ route('admin.roles.store') }}">
                @csrf

                <div class="row mb-4">
                    <div class="my-3 my-md-0  col-12 col-md-6 ">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" name="display_name" class="form-control"
                               id="name" placeholder="إسم الدور"
                               value="{{ old('display_name') }}"
                               aria-describedby="Name"/>
                        <x-input-error class="mt-2" :messages="$errors->get('display_name')"/>
                    </div>
                </div>

                <hr>
                <h4>الصلاحيات</h4>


                <div class="row mb-4">
                    @foreach($permissions as $index => $permission)
                        <div class="col-6 col-md-3 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="permission_{{ $permission->id }}"
                                       name="permissions[]"
                                       @checked(in_array($permission->id, old('permissions', [])))
                                       value="{{ $permission->id }}">
                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                    {{ $permission->display_name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex align-content-center gap-3">
                    <button class="btn btn-primary" type="submit">حفظ</button>
                    <a href="{{ route('admin.roles.index') }}"
                       class="d-block btn btn-secondary">العودة</a>
                </div>
            </form>

        </div>
    </div>
@endsection
