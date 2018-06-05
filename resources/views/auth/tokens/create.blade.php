@extends('layouts.master')

@section('title', '| New Token')

@section('links')
    <link rel="stylesheet" href="{{ asset('vendor/formvalidation/dist/css/formValidation.min.css') }}">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header">New Activation Link</div>

                <div class="card-body">

                    @include('auth.forms._token')

                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('vendor/formvalidation/dist/js/formValidation.min.js') }}"></script>
    <script src="{{ asset('vendor/formvalidation/dist/js/framework/bootstrap4.min.js') }}"></script>

    <script>
        @include('validators.auth._email')
    </script>
@endsection