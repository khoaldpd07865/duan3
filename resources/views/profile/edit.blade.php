@extends('layouts.app')

@section('content')
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Styles -->

<div class="container py-5">

    <div class="row">
        <!-- Update Profile Information -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('Update Profile Information') }}</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <!-- Update Password -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('Update Password') }}</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <!-- Delete Account -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">{{ __('Delete Account') }}</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection