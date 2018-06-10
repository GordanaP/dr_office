@extends('layouts.app')

@section('title', '| Test')

@section('content')
    <form action="{{ route('users.accounts.update', $user) }}" method="POST">

        @csrf
        @method('PATCH')

        <input type="text" name="email" id="email" value="{{ $user->name }}">

        <button type="submit" class="btn btn-info">Update</button>
    </form>

@endsection

