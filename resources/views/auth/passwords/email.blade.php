@extends('layouts.master')

@section('title', '| Forgot Password')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('auth.forms._forgotPassword')

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