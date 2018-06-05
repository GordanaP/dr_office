@extends('layouts.app')

@section('title', '| My account')

@section('links')
    <link rel="stylesheet" href="{{ asset('vendor/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('side')
    @include('partials.side._auth')
@endsection

@section('content')
    @component('components.user_card')
        @slot('header')
            <i class="fa fa-lock fa-panel mr-6"></i> My account
        @endslot

        @slot('body')
            @include('users.accounts.partials.forms._edit')
        @endslot
    @endcomponent
@endsection

@section('scripts')
    <script src="{{ asset('vendor/formvalidation/dist/js/formValidation.min.js') }}"></script>
    <script src="{{ asset('vendor/formvalidation/dist/js/framework/bootstrap4.min.js') }}"></script>

    <script>
        @include('users.accounts.js._JSvalidationPHP')
    </script>
@endsection