@extends('dashboard.layouts.master')
@section('title', 'إنشاء شهادة')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            اراء العملاء
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
            <form method="post" action="{{ route('admin.testimonials.store') }}">
                @csrf

                <div class="form-check form-switch d-flex align-items-center justify-content-end gap-3 mb-5">
                    <input class="form-check-input fs-large" name="status" value="active"
                           @checked(old('status') === \App\Enums\Status::ACTIVE->value)
                           type="checkbox"
                           id="blog">
                    <label class="form-check-label" for="blog">حاله الشهادة</label>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>

                <div class="row mb-4">

                    <div class="my-3 my-md-0  col-12 col-md-6 ">
                        <label for="c_name" class="form-label">إسم العميل</label>
                        <input type="text" name="client_name" class="form-control"
                               id="c_name" placeholder="إسم العميل"
                               value="{{ old('client_name') }}"
                               aria-describedby="Client Name"/>
                        <x-input-error class="mt-2" :messages="$errors->get('client_name')" />
                    </div>
                    <div class="my-3 my-md-0  col-12 col-md-6">
                        <label for="job_title" class="form-label">وظيفة العميل</label>
                        <input type="text" name="job_title" class="form-control"
                               id="job_title" placeholder="وظيفة العميل"
                               value="{{ old('job_title') }}"
                               aria-describedby="Company Name"/>
                        <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
                    </div>


                    <div class="form-group mt-4">
                        <label for="testimonial" class="form-label">شهادة العميل</label>
                        <textarea class="form-control" name="testimonial" id="testimonial"
                                  cols="30"
                                  rows="5">{{ old('testimonial') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('testimonial')" />
                    </div>
                </div>

                <div class="d-flex align-content-center gap-3">
                    <button class="btn btn-primary" type="submit">حفظ</button>
                    <a href="{{ route('admin.testimonials.index') }}"
                       class="d-block btn btn-secondary">العودة</a>
                </div>
            </form>

        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
