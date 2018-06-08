@extends('layouts.app')

@section('title', '| My Avatar')

@section('side')
    @include('partials.side._auth')
@endsection

@section('content')

    @component('components.user_card')
        @slot('header')
                <i class="fa fa-user-circle mr-6"></i> My avatar
        @endslot

        @slot('body')
            @include('users.avatars.partials.forms._edit')
        @endslot
    @endcomponent
@endsection