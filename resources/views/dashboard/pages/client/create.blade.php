@extends('dashboard.layouts.master')
@section('title', 'إضافة عميل')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            إضافة عميل
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.clients.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-xl-12 col-md-12">
                                <div class="d-flex justify-content-between">
                                    <div class="my-3 col-12 col-md-6">
                                        <label for="name" class="form-label">الإسم</label>
                                        <input type="text" name="name" class="form-control"
                                               id="name" placeholder="الإسم"
                                               value="{{ old('name') }}"
                                               aria-describedby="name"/>
                                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                    </div>

                                    <div class="form-check form-switch d-flex align-items-center justify-content-center  gap-3 mb-5 ">
                                        <input class="form-check-input fs-large" name="status" value="active"
                                               @checked(old('status') === \App\Enums\Status::ACTIVE->value)
                                               type="checkbox"
                                               id="blog">
                                        <label class="form-check-label" for="blog">الحالة</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
                                    </div>
                                </div>

                                <div class="my-3 col-12 col-md-6">
                                    <label for="file_input" class="form-label">Logo</label>
                                    <input type="file" name="logo" class="form-control"
                                           id="file_input"
                                           aria-describedby="File input"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                                </div>
                                <div class="d-flex align-content-center justify-content-end gap-3">
                                    <button class="btn btn-primary" type="submit">حفظ</button>
                                    <a href="{{ route('admin.clients.index') }}"
                                       class="d-block btn btn-secondary">العودة</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
