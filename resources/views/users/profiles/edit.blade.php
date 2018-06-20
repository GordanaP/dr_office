@extends('layouts.admin')

@section('title', '| Admin | Profiles | Edit')

@section('links')
    <style>
        #userEducation p { margin-left: 18px; margin-bottom: 8px; }
        button { border-radius: 0 !important }
    </style>
@endsection

@section('content')

    @component('components.admin.main')
        @slot('title')
            <span id="userProfileName" class="mr-3">
                {{ $profile->title }} {{ $profile->getFullName() }}
            </span>
            <button type="button" class="btn btn-warning btn-link" id="editProfile" data-name="{{ $profile->user->name }}" value="{{$profile->user->id }}">
                 Edit
            </button>
        @endslot

        @slot('class')
        @endslot

        @slot('content')
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
        @endslot
    @endcomponent

    <!-- Modals -->
    @include('users.profiles.partials.modals._edit')
    @include('users.profiles.partials.modals._education')
    @include('users.avatars.partials.modals._edit')
    @include('users.working_days.partials.modals._create')
    @include('users.working_days.partials.modals._edit')

@endsection

@section('scripts')
    <script>

        // Profile
        var profile = "{{ $profile->slug }}",
            profileModal = $('#profileModal'),
            profileForm = $('#adminProfileForm'),
            profileFields = ['title', 'first_name', 'last_name']

        profileModal.setAutofocus('title')
        profileModal.emptyModal(profileFields)

        // Avatar
        var avatarModal = $('#avatarModal'),
            avatarForm = $('#userAvatarForm'),
            avatarFields = ['avatar_options', 'avatar']

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
            arraySize = 6,
            i = 0

        createScheduleModal.on("hidden.bs.modal", function() {
            clearForm($(this))
            clearServerErrorsForArrayFields(scheduleFieldsName, scheduleFields, arraySize)
            $('.field').remove()
        })

        var editScheduleModal = $('#editScheduleModal'),
            editScheduleForm = $('#editScheduleForm')

        editScheduleModal.on("hidden.bs.modal", function() {
            clearForm($(this))
            clearServerErrorsForArrayFields(scheduleFieldsName, scheduleFields, arraySize)
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

        // Manipulate dynamic fields
        @include('users.profiles.js.schedule._dyn_fields_create')

        @include('users.profiles.js.schedule._dyn_fields_edit')

        // Edit schedule
        @include('users.profiles.js.schedule._edit')

        // Store schedule
        @include('users.profiles.js.schedule._store')

        // Update schedule

        $(document).on('click', '#updateSchedule', function(){

            var chunkSize = 3;
            var day = createScheduleArray('day', chunkSize);
            var updateScheduleUrl = '/admin/working_days/' + profile

            console.log(day)
            // $.ajax({
            //     url: updateScheduleUrl,
            //     type: "PATCH",
            //     data: {
            //         day: day
            //     },
            //     success: function(response)
            //     {
            //         $('#displaySchedule').load(location.href + ' #displaySchedule')
            //         $('.btn-schedule').text('Change')

            //         successResponse(editScheduleModal, response.message)
            //     },
            //     error: function(response)
            //     {
            //         errorResponse(editScheduleModal, jsonErrors(response))
            //     }
            // })
        })

    </script>
@endsection

