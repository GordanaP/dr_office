@extends('layouts.master')

@section('title', '| Reset Password')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Reset Password</div>

                    <div class="card-body">
                        @include('auth.forms._resetPassword')
                    </div>
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