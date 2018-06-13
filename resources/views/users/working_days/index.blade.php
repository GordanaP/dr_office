@extends('layouts.admin')

@section('title', '| Admin | Schedue')

@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />

    <style>
        .btn-link {border: none}
    </style>
@endsection

@section('content')
    @component('components.admin.main')
        @slot('title')
            <span>Working Schedule</span>
        @endslot

        @slot('content')
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <th class="text-left">Doctor</th>
                        @foreach ($days as $day)
                            <th>{{ $day->name }}</th>
                        @endforeach
                    </thead>
                    <tbody>
                        @foreach ($profiles as $profile)
                            @include('users.working_days.partials._profile_schedule', [
                                'days' => $days
                            ])
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endslot
    @endcomponent
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>


    </script>

@endsection