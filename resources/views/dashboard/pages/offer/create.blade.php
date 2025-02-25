@extends('dashboard.layouts.master')
@section('title', 'إنشاء عرض عقاري')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            العروض العقارية
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

                        <form method="POST" action="{{ route('admin.offers.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-xl-12 col-md-12">
                                <div class="row">
                                    <!-- First Row: 3 Inputs on md and larger -->
                                    <div class="col-12 col-md-4 my-3">
                                        <label for="property_type" class="form-label">نوع العقار</label>
                                        <select name="property_type" class="form-control" id="property_type">
                                            <option value="">اختر</option>
                                            @foreach(\App\Enums\PropertyType::cases() as $propertyType)
                                                <option value="{{ $propertyType->value }}" @selected(old('property_type') === $propertyType->value)>
                                                    {{ $propertyType->label() }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <x-input-error class="mt-2" :messages="$errors->get('property_type')" />
                                    </div>

                                    <div class="col-12 col-md-4 my-3">
                                        <label for="price" class="form-label">السعر</label>
                                        <input type="text" name="price" class="form-control" id="price" placeholder="السعر"
                                               value="{{ old('price') }}" aria-describedby="price"/>
                                        <x-input-error class="mt-2" :messages="$errors->get('price')" />
                                    </div>

                                    <div class="col-12 col-md-4 my-3">
                                        <label for="price_type" class="form-label">نوع السعر</label>
                                        <select name="price_type" class="form-control" id="price_type">
                                            <option value="">اختر</option>
                                            @foreach(\App\Enums\OfferPriceType::cases() as $offerPriceType)
                                                <option value="{{ $offerPriceType->value }}" @selected(old('price_type') === $offerPriceType->value)>
                                                    {{ $offerPriceType->label() }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('price_type')" />
                                    </div>
                                </div>

                                <!-- Additional Inputs -->
                                <div class="row">
                                    <div class="col-12 col-md-4 my-3">
                                        <label for="offer_type" class="form-label">نوع العرض</label>
                                        <select name="offer_type" class="form-control" id="offer_type">
                                            <option value="">اختر</option>
                                            @foreach(\App\Enums\OfferType::cases() as $offerType)
                                                <option value="{{ $offerType->value }}" @selected(old('offer_type') === $offerType->value)>
                                                    {{ $offerType->label() }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('offer_type')" />
                                    </div>

                                    <div class="col-12 col-md-4 my-3">
                                        <label for="location" class="form-label">المكان</label>
                                        <select name="location" class="form-control" id="location">
                                            <option value="">اختر</option>
                                            @foreach(\App\Enums\PropertyLocations::cases() as $propertyLocation)
                                                <option value="{{ $propertyLocation->value }}" @selected(old('location') === $propertyLocation->value)>
                                                    {{ $propertyLocation->label() }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('location')" />
                                    </div>

                                    <div class="form-check form-switch d-flex align-items-center justify-content-center gap-3 col-12 col-md-4 my-3">
                                        <input class="form-check-input fs-large" name="status" value="active"
                                               @checked(old('status') === \App\Enums\Status::ACTIVE->value)
                                               type="checkbox"
                                               id="blog">
                                        <label class="form-check-label" for="blog">حاله العرض</label>
                                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
                                    </div>
                                </div>


                                <div class="nav-align-top mb-5 shadow-none mt-4">
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

                                            <div class="form-group my-3">
                                                <label for="short_title_ar" class="form-label">عنوان مختصر</label>

                                                <textarea class="form-control" name="short_title[ar]" id="short_title_ar"
                                                          cols="30"
                                                          rows="5">{{ old('short_title.ar') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('short_title.ar')" />
                                            </div>

                                            <div class="form-group my-3">
                                                <label for="title_ar" class="form-label">العنوان</label>

                                                <textarea class="form-control" name="title[ar]" id="title_ar"
                                                          cols="30"
                                                          rows="5">{{ old('title.ar') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('title.ar')" />
                                            </div>

                                            <div class="form-group my-3">
                                                <label for="short_description_ar" class="form-label">وصف مختصر</label>
                                                <textarea class="form-control" name="short_description[ar]" id="short_description_ar"
                                                          cols="30"
                                                          rows="5">{{ old('short_description.ar') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('short_description.ar')" />
                                            </div>

                                            <div class="form-group my-3">
                                                <label for="description_ar" class="form-label">الوصف</label>
                                                <textarea class="form-control" name="description[ar]" id="description_ar"
                                                          cols="30"
                                                          rows="10">{{ old('description.ar') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('description.ar')" />
                                            </div>

                                            <hr class="mt-4">

                                            <h4>تفاصيل العرض</h4>

                                            <div>
                                                <div class="form-group my-3">
                                                    <label for="property_specifications_ar" class="form-label">مواصفات العقار</label>
                                                    <textarea class="form-control" name="property_specifications[ar]" id="property_specifications_ar"
                                                              cols="30"
                                                              rows="10">{{ old('property_specifications.ar') }}</textarea>
                                                    <x-input-error class="mt-2" :messages="$errors->get('property_specifications.ar')" />
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="property_contents_ar" class="form-label">محتويات العقار</label>
                                                    <textarea class="form-control" name="property_contents[ar]" id="property_contents_ar"
                                                              cols="30"
                                                              rows="10">{{ old('property_contents.ar') }}</textarea>
                                                    <x-input-error class="mt-2" :messages="$errors->get('property_contents.ar')" />
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="property_features_ar" class="form-label">مميزات العقار</label>
                                                    <textarea class="form-control" name="property_features[ar]" id="property_features_ar"
                                                              cols="30"
                                                              rows="10">{{ old('property_features.ar') }}</textarea>
                                                    <x-input-error class="mt-2" :messages="$errors->get('property_features.ar')" />
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="financial_communication_ar" class="form-label">الماليه والتواصل</label>
                                                    <textarea class="form-control" name="financial_communication[ar]" id="financial_communication_ar"
                                                              cols="30"
                                                              rows="10">{{ old('financial_communication.ar') }}</textarea>
                                                    <x-input-error class="mt-2" :messages="$errors->get('financial_communication.ar')" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                                            <div class="form-group my-3">
                                                <label for="short_title_en" class="form-label">عنوان مختصر</label>

                                                <textarea class="form-control" name="short_title[en]" id="short_title_en"
                                                          cols="30"
                                                          rows="5">{{ old('short_title.en') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('short_title.en')" />
                                            </div>

                                            <div class="form-group my-3">
                                                <label for="title_en" class="form-label">العنوان</label>

                                                <textarea class="form-control" name="title[en]" id="title_en"
                                                          cols="30"
                                                          rows="5">{{ old('title.en') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('title.en')" />
                                            </div>

                                            <div class="form-group my-3">
                                                <label for="short_description_en" class="form-label">وصف مختصر</label>
                                                <textarea class="form-control" name="short_description[en]" id="short_description_en"
                                                          cols="30"
                                                          rows="5">{{ old('short_description.en') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('short_description.en')" />
                                            </div>

                                            <div class="form-group">
                                                <label for="description_en" class="form-label">الوصف</label>
                                                <textarea class="form-control" name="description[en]" id="description_en"
                                                          cols="30"
                                                          rows="10">{{ old('description.en') }}</textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('description.en')" />
                                            </div>

                                            <hr class="mt-4">

                                            <h4>تفاصيل العرض</h4>

                                            <div>
                                                <div class="form-group my-3">
                                                    <label for="property_specifications_en" class="form-label">مواصفات العقار</label>
                                                    <textarea class="form-control" name="property_specifications[en]" id="property_specifications_en"
                                                              cols="30"
                                                              rows="10">{{ old('property_specifications.en') }}</textarea>
                                                    <x-input-error class="mt-2" :messages="$errors->get('property_specifications.en')" />
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="property_contents_en" class="form-label">محتويات العقار</label>
                                                    <textarea class="form-control" name="property_contents[en]" id="property_contents_en"
                                                              cols="30"
                                                              rows="10">{{ old('property_contents.en') }}</textarea>
                                                    <x-input-error class="mt-2" :messages="$errors->get('property_contents.en')" />
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="property_features_en" class="form-label">مميزات العقار</label>
                                                    <textarea class="form-control" name="property_features[en]" id="property_features_en"
                                                              cols="30"
                                                              rows="10">{{ old('property_features.en') }}</textarea>
                                                    <x-input-error class="mt-2" :messages="$errors->get('property_features.en')" />
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="financial_communication_en" class="form-label">الماليه والتواصل</label>
                                                    <textarea class="form-control" name="financial_communication[en]" id="financial_communication_en"
                                                              cols="30"
                                                              rows="10">{{ old('financial_communication.en') }}</textarea>
                                                    <x-input-error class="mt-2" :messages="$errors->get('financial_communication.en')" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="media-data" role="tabpanel">
                                            <div class="my-3 col-12 col-md-6">
                                                <label for="brochure_input" class="form-label">الكتيب</label>
                                                <input type="file" name="brochure" class="form-control"
                                                       id="brochure_input"
                                                       aria-describedby="brochure input"/>
                                                <x-input-error class="mt-2" :messages="$errors->get('brochure')" />
                                            </div>

                                            <div class="my-3 col-12 col-md-6">
                                                <label for="file_input" class="form-label">
                                                    صور العقار</label>
                                                <input type="file" name="files[]" class="form-control"
                                                       multiple
                                                       id="file_input"
                                                       aria-describedby="File input"/>
                                                <x-input-error class="mt-2" :messages="$errors->get('files')" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-content-center justify-content-end gap-3">
                                    <button class="btn btn-primary" type="submit">حفظ</button>
                                    <a href="{{ route('admin.offers.index') }}"
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
            selector: `#short_title_ar, #short_title_en`,
            height: 150,
            plugins: 'link lists code',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media template link anchor codesample | ltr rtl',
            menubar: false
        });
        tinymce.init({
            selector: `#title_ar, #title_en, #short_description_ar, #short_description_en`,
            height: 200,
            plugins: 'link lists code',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media template link anchor codesample | ltr rtl',
            menubar: false
        });
        tinymce.init({
            selector: `#description_ar, #description_en, #property_specifications_ar, #property_contents_ar, #property_features_ar, #financial_communication_ar, #property_specifications_en, #property_contents_en, #property_features_en, #financial_communication_en`,
            height: 300,
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
