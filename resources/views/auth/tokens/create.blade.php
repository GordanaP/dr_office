@extends('layouts.master')

@section('title', '| New Token')

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