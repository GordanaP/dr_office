@extends('layouts.master')

@section('title', '| My account')

@section('content')
    <div class="col-md-8 offset-md-2">
        @component('components.user_card')
            @slot('header')
                <i class="fa fa-lock mr-6"></i> My account
            @endslot

            @slot('body')
                @include('users.accounts.partials.forms._edit')
            @endslot
        @endcomponent
    </div>
@endsection

@section('scripts')
    <script>
        clearErrorOnNewInput()
    </script>
@endsection