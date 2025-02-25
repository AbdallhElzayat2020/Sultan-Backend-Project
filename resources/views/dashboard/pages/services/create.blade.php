@extends('dashboard.layouts.master')
@section('title', 'إنشاء خدمه')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            الخدمات
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

                        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-xl-12 col-md-12">
                                <div class="d-flex justify-content-between">
                                    <div class="my-3 col-12 col-md-6">
                                        <label for="contact_number" class="form-label">رقم التواصل</label>
                                        <input type="text" name="contact_number" class="form-control"
                                               id="contact_number" placeholder="رقم التواصل"
                                               value="{{ old('contact_number') }}"
                                               aria-describedby="contact_number"/>
                                        <x-input-error class="mt-2" :messages="$errors->get('contact_number')" />
                                    </div>

                                    <div class="form-check form-switch d-flex align-items-center justify-content-center  gap-3 mb-5 ">
                                        <input class="form-check-input fs-large" name="status" value="active"
                                               @checked(old('status') === \App\Enums\Status::ACTIVE->value)
                                               type="checkbox"
                                               id="blog">
                                        <label class="form-check-label" for="blog">حاله الخدمه</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
                                    </div>
                                </div>

                                <div class="nav-align-top mb-5 shadow-none mt-3">
                                    <ul class="nav nav-pills mb-3" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#navs-pills-top-home"
                                                    aria-controls="navs-pills-top-home"
                                                    aria-selected="true">
                                                العربيه
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                    data-bs-target="#navs-pills-top-profile"
                                                    aria-controls="navs-pills-top-profile"
                                                    aria-selected="false">
                                                الإنجليزيه
                                            </button>
                                        </li>

                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                    data-bs-target="#media-data"
                                                    aria-controls="media-data"
                                                    aria-selected="false">
                                                الميديا
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content shadow-none">
                                        <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                                            <div class="my-3 col-12 col-md-6">
                                                <label for="defaultFormControlInput" class="form-label">إسم
                                                    الخدمه</label>
                                                <input type="text" name="title[ar]" class="form-control"
                                                       id="title_ar" placeholder="إسم الخدمه"
                                                       value="{{ old('title.ar') }}"
                                                       aria-describedby="title_ar"/>
                                                <x-input-error class="mt-2" :messages="$errors->get('title.ar')" />
                                            </div>

                                            <div class="form-group my-3">
                                                <label for="short_description_ar" class="form-label">وصف مختصر</label>
                                                <textarea class="form-control" name="short_description[ar]"
                                                          id="short_description_ar"
                                                          cols="30"
                                                          rows="5">{{ old('short_description.ar') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('short_description.ar')" />
                                            </div>

                                            <div class="form-group">
                                                <label for="description_ar" class="form-label">تفاصيل الخدمه</label>
                                                <textarea class="form-control" name="description[ar]"
                                                          id="description_ar"
                                                          cols="30"
                                                          rows="10">{{ old('description.ar') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('description.ar')" />
                                            </div>

                                            <hr class="mt-4">

                                            <div>
                                                <h4>المميزات</h4>

                                                <x-input-error class="mt-2" :messages="$errors->get('features')" />

                                                <div x-data="{ features: [] }">
                                                    <div class="table-responsive text-nowrap">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th style="width: 20px">#</th>
                                                                <th>الميزه</th>
                                                                <th style="width: 25px">التحكم</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="table-border-bottom-0">
                                                            <template x-for="(feature, index) in features" :key="index">
                                                                <tr>
                                                                    <td style="width: 20px" x-text="index + 1"></td>
                                                                    <td>
                                                                        <input type="text"
                                                                               :name="`features[${index}][ar]`"
                                                                               class="form-control border-0 shadow-none"
                                                                               :placeholder="`ميزه رقم ${index + 1}`"
                                                                               x-model="features[index].name"
                                                                               aria-describedby="feature text"/>
                                                                    </td>
                                                                    <td style="width: 25px">
                                                                        <button class="btn btn-danger" type="button"
                                                                                @click="features.splice(index, 1)">حذف
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </template>
                                                            </tbody>
                                                        </table>
                                                        <button @click="features.push({})" type="button"
                                                                class="btn btn-success mt-3">إضافه ميزه
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                                            <div class="my-3 col-12 col-md-6">
                                                <label for="title_en" class="form-label">إسم الخدمه</label>
                                                <input type="text" name="title[en]" class="form-control"
                                                       value="{{ old('title.en') }}"
                                                       id="title_en" placeholder="إسم الخدمه"
                                                       aria-describedby="defaultFormControlHelp"/>
                                                <x-input-error class="mt-2" :messages="$errors->get('title.en')" />
                                            </div>

                                            <div class="form-group my-3">
                                                <label for="short_description_en" class="form-label">وصف مختصر</label>
                                                <textarea class="form-control" name="short_description[en]"
                                                          id="short_description_en"
                                                          cols="30"
                                                          rows="5">{{ old('short_description.en') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('short_description.en')" />
                                            </div>

                                            <div class="form-group">
                                                <label for="description_en" class="form-label">تفاصيل الخدمه</label>
                                                <textarea class="form-control" name="description[en]"
                                                          id="description_en"
                                                          cols="30"
                                                          rows="10">{{ old('description.en') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('description.en')" />
                                            </div>

                                            <hr class="mt-4">

                                            <div>
                                                <h4>المميزات</h4>

                                                <div x-data="{ features: [] }">
                                                    <div class="table-responsive text-nowrap">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th style="width: 20px">#</th>
                                                                <th>الميزه</th>
                                                                <th style="width: 25px">التحكم</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="table-border-bottom-0">
                                                            <template x-for="(feature, index) in features" :key="index">
                                                                <tr>
                                                                    <td style="width: 20px" x-text="index + 1"></td>
                                                                    <td>
                                                                        <input type="text"
                                                                               :name="`features[${index}][en]`"
                                                                               class="form-control border-0 shadow-none"
                                                                               :placeholder="`ميزه رقم ${index + 1}`"
                                                                               x-model="features[index].name"
                                                                               aria-describedby="feature text"/>
                                                                    </td>
                                                                    <td style="width: 25px">
                                                                        <button class="btn btn-danger" type="button"
                                                                                @click="features.splice(index, 1)">حذف
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </template>
                                                            </tbody>
                                                        </table>
                                                        <button @click="features.push({})" type="button"
                                                                class="btn btn-success mt-3">إضافه ميزه
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="media-data" role="tabpanel">
                                            <div class="my-3 col-12 col-md-6">
                                                <label for="icon_input" class="form-label">
                                                    صورة مصغرة ( بمقاس 100 * 100 )</label>
                                                <input type="file" name="icon" class="form-control"
                                                       id="icon_input"
                                                       aria-describedby="Icon input"/>
                                                <x-input-error class="mt-2" :messages="$errors->get('icon')" />
                                            </div>

                                            <div class="my-3 col-12 col-md-6">
                                                <label for="file_input" class="form-label">
                                                    صورة الخدمة</label>
                                                <input type="file" name="file" class="form-control"
                                                       id="file_input"
                                                       aria-describedby="File input"/>
                                                <x-input-error class="mt-2" :messages="$errors->get('file')" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-content-center justify-content-end gap-3">
                                    <button class="btn btn-primary" type="submit">حفظ</button>
                                    <a href="{{ route('admin.services.index') }}"
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

@section('js')
    <script src="{{ asset('assets/dashboard/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: `#short_description_ar, #short_description_en`,
            height: 200,
            plugins: 'link lists code',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media template link anchor codesample | ltr rtl',
            menubar: false
        });
        tinymce.init({
            selector: `#description_ar, #description_en`,
            height: 400,
            plugins: 'link lists code',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media template link anchor codesample | ltr rtl',
            menubar: false
        });
    </script>
@endsection

@section('css')
    <style>
        .tox-promotion-link, .tox-statusbar__branding {
            display: none !important;
        }
    </style>
@endsection
