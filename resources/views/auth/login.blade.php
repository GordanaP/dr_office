@extends('layouts.master')

@section('title', '| Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header">Login</div>

                <div class="card-body">
                    @include('auth.forms._login')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        clearErrorOnNewInput()

    </script>
@endsection