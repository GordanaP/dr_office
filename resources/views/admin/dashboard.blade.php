@extends('layouts.admin')

@section('title', '| Admin')

@section('content')
    @include('partials.admin._main')

    <button id="editButton">Open modal</button>
@endsection