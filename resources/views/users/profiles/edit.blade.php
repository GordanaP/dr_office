@extends('layouts.app')

@section('title', '| My Profile')

@section('side')
    @include('partials.side._auth')
@endsection

@section('content')
    @component('components.user_card')
        @slot('header')
            <i class="fa fa-user mr-6"></i> My profile
        @endslot

        @slot('body')
            @include('users.profiles.partials.forms._edit')
        @endslot
    @endcomponent
@endsection