@extends('layouts.admin')

@section('title', '| Admin | Profiles | Edit')

@section('links')
    <style>
        #userEducation p { margin-left: 18px; margin-bottom: 8px; }
        button { border-radius: 0 !important }
    </style>
@endsection

@section('content')
    <!-- Page title -->
    <div class="pb-2 col-md-12">
        <h2 class="admin-title-no-button">
            <span id="userProfileName" class="mr-3">
                {{ $profile->title }} {{ $profile->getFullName() }}
            </span>

            <button type="button" class="btn btn-warning btn-link" id="editProfile"  data-name="{{ $profile->user->name }}" value="{{$profile->user->id }}">
                 Edit
            </button>
        </h2>
        <hr>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div id="userProfileAvatar" class="text-center mb-3">
                        <img class="card-img-top image image-responsive" src="{{ asset($profile->getAvatar()) }}" alt="" style="max-height: 280px" />
                    </div>
                    <a href="#" id="changeAvatar" class="text-center"  data-name="{{ $profile->user->name }}" data-profile="{{ $profile->slug }}">
                        Change
                    </a>

                    <div class="card-body mt-3">
                        <h5 class="card-title align-center justify-between flex mb-0">
                            <span>Working days</span>
                            <button type="button" class="btn btn-info rounded-none" id="{{ $profile->hasSchedule() ? 'changeSchedule' : 'addChedule'}}">
                                {{ $profile->hasSchedule() ? 'Change' : 'Add'}}
                            </button>
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($profile->workingDays as $day)
                            <li class="list-group-item">
                                {{ $day->name }}
                                <span class="pull-right">{{ $day->work->start_at }}-{{ $day->work->end_at }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        @include('users.profiles.partials._card')
                    </div>
                    <div class="col-md-6">
                        @include('users.profiles.partials._card')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    @include('users.profiles.partials.modals._edit')
    @include('users.profiles.partials.modals._education')
    @include('users.avatars.partials.modals._edit')
    @include('users.working_days.partials.modals._edit')

@endsection

@section('scripts')
    <script>

        // Profile
        var profileModal = $('#profileModal')
        var profileForm = $('#adminProfileForm')
        var profileFields = ['title', 'first_name', 'last_name']

        profileModal.setAutofocus('title')
        profileModal.emptyModal(profileFields)

        // Avatar
        var avatarModal = $('#avatarModal')
        var avatarForm = $('#userAvatarForm')
        var avatarFields = ['avatar_options', 'avatar']

        avatarModal.setAutofocus('avatar_options')
        avatarModal.emptyModal(avatarFields)

        // Education
        var educationModal = $('#educationModal'),
            educationForm = $('#educationForm'),
            educationFields = ['education']

        educationModal.setAutofocus('education')
        educationModal.emptyModal(educationFields)

        // WorkingDays
        var scheduleModal = $('#scheduleModal'),
            scheduleForm = $('#scheduleForm')

        // Edit profile
        @include('users.profiles.js._edit')

        // Save profile
        @include('users.profiles.js._save')

        // Delete profile
        @include('users.profiles.js._delete')

        // Edit Avatar
        @include('users.avatars.js._edit')

        // Save Avatar
        @include('users.avatars.js._save')

        // Edit education
        @include('users.profiles.js.education._edit')

        // Save education
        @include('users.profiles.js.education._save')


        $(document).on('click', '#changeSchedule', function(){
            scheduleModal.modal('show')
        })

    </script>
@endsection

