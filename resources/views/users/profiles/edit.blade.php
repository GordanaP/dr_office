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
        <div class="card border-0" id="pageTitle">

            <h2 class="admin-title-no-button">
            <span id="userProfileName" class="mr-3">
                {{ $profile->title }} {{ $profile->getFullName() }}
            </span>

            <button type="button" class="btn btn-warning btn-link" id="editProfile" data-name="{{ $profile->user->name }}" value="{{$profile->user->id }}">
                 Edit
            </button>
            </h2>
        </div>
    <hr>
    </div>

    <div class="col-md-12">
        <div class="row">

            <!-- Profile schedule -->
            <div class="col-md-3">
                @include('users.profiles.partials.cards._schedule')
            </div>

            <!-- Profile details -->
            <div class="col-md-9">
                @include('users.profiles.partials.cards._details')
            </div>
        </div>
    </div>

    <!-- Modals -->
    @include('users.profiles.partials.modals._edit')
    @include('users.profiles.partials.modals._education')
    @include('users.avatars.partials.modals._edit')
    @include('users.working_days.partials.modals._create')

@endsection

@section('scripts')
    <script>

        // Profile
        var profile = "{{ $profile->slug }}"
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

        // Working days
        var createScheduleModal = $('#createScheduleModal'),
            createScheduleForm = $('#createScheduleForm'),
            scheduleFields = ['working_day_id', 'start_at', 'end_at'],
            scheduleFieldsName = 'day',
            workingDays = @json($days),
            days = getDays(workingDays),
            i = 0

        createScheduleModal.on("hidden.bs.modal", function() {
            clearForm($(this))
            clearServerErrorsForArrayFields(scheduleFieldsName, scheduleFields, 6)
            $('.field').remove()
        })

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

        // Create schedule
        @include('users.profiles.js.schedule._create')

        // Create schedule
        @include('users.profiles.js.schedule._create')

        // Manipulate dynamic fileds
        @include('users.profiles.js.schedule._dynamic_fields')

        // Store schedule
        @include('users.profiles.js.schedule._store')

    </script>
@endsection

