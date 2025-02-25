@extends('dashboard.layouts.master')
@section('title', 'حسابي')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3">
حسابي
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
        <div class="col-md-12">

            <!-- Profile Details -->
            <div class="card mb-4">
                @include('profile.partials.update-profile-information-form')
            </div>
            <!-- /Profile Details -->

            <!-- Update Password -->
            <div class="card mb-4">
                @include('profile.partials.update-password-form')
            </div>
            <!-- /Update Password -->
        </div>
    </div>

    </div>
@endsection
