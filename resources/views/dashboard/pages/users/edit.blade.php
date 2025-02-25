@extends('dashboard.layouts.master')
@section('title', 'تعديل مستخدم')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            تعديل مستخدم
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
            <form method="post" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="row mb-4">
                    <div class="my-3 my-md-0  col-12 col-md-6 ">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" name="name" class="form-control"
                               id="name" placeholder="إسم المستخدم"
                               value="{{ old('name', $user->name) }}"
                               aria-describedby="Name"/>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="my-3 my-md-0  col-12 col-md-6">
                        <label for="email" class="form-label">البريد</label>
                        <input type="email" name="email" class="form-control"
                               id="email" placeholder="البريد"
                               value="{{ old('email', $user->email) }}"
                               aria-describedby="Email"/>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="my-3 my-md-0  col-12 col-md-6">
                        <label for="role" class="form-label">الدور</label>
                        <select name="role" class="form-control" id="role">
                            <option value="" selected disabled>اختر</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" @selected(old('role', $userRole?->name) === $role->name)>
                                    {{ $role->display_name }}
                                </option>
                            @endforeach
                        </select>

                        <x-input-error class="mt-2" :messages="$errors->get('role')" />
                    </div>
                </div>

                <div class="d-flex align-content-center gap-3">
                    <button class="btn btn-primary" type="submit">حفظ</button>
                    <a href="{{ route('admin.users.index') }}"
                       class="d-block btn btn-secondary">العودة</a>
                </div>
            </form>

        </div>
    </div>
@endsection
