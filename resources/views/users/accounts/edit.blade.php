@extends('layouts.app')

@section('title', '| My account')

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