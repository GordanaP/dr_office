@extends('layouts.admin')

@section('title', '| Admin | Profiles | Edit')

@section('links')
    <style>
        #userEducation p { margin-left: 18px; margin-bottom: 8px; }
        button { border-radius: 0 !important }
        .is-hidden {display: none}
    </style>
@endsection

@section('content')
    <!-- Page title -->
    <div class="pb-2 col-md-12">
        <h2 class="admin-title-no-button">
            <span id="userProfileName" class="mr-3">
                {{ $profile->title }} {{ $profile->getFullName() }}
            </span>

            <button type="button" class="btn btn-warning btn-link" id="editProfile" data-name="{{ $profile->user->name }}" value="{{$profile->user->id }}">
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
                    <a href="#" id="changeAvatar" class="text-center" data-name="{{ $profile->user->name }}" data-profile="{{ $profile->slug }}">
                        Change
                    </a>

                    <div class="card-body mt-3">
                        <h5 class="card-title align-center justify-between flex mb-0">
                            <span>Working days</span>
                            <button type="button" class="btn btn-info rounded-none btn-schedule" id="{{ $profile->hasSchedule() ? 'changeSchedule' : 'createSchedule'}}">
                                {{ $profile->hasSchedule() ? 'Change' : 'Add'}}
                            </button>
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush" id="displaySchedule">
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
    @include('users.working_days.partials.modals._create')

@endsection

@section('scripts')
    <script>

        var profile = "{{ $profile->slug }}"

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
        var createScheduleModal = $('#createScheduleModal'),
            createScheduleForm = $('#createScheduleForm'),
            scheduleFields = ['working_day_id', 'start_at', 'end_at']
            scheduleFieldsName = 'day'

        createScheduleModal.on("hidden.bs.modal", function(){
            clearForm($(this))
            clearServerErrorsForInputArray(scheduleFieldsName, scheduleFields, 6)
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
        $(document).on('click', '#createSchedule', function()
        {
            createScheduleModal.modal('show');
        })

        // Add form fields dinamically
        var i = 0;

        function addDynamicFields(totalFields, maxFields, html)
        {
            // var totalFields = $(".field").length;
            // var maxFields = 6

            if (totalFields < maxFields)
            {
                $('#workingDaysFields, #schedule').append(html)
            }

        }


        $(document).on('click', '#add', function() {

            i++;
            var totalFields = $(".field").length;
            var maxFields = 6

            var html = ''

            html += '<div class="form-group flex field added-field">'

            html += '<div><input type="text" name="day['+ i +'][working_day_id]" class="form-control day-'+ i +'-working_day_id"><span class="invalid-feedback day-'+ i +'-working_day_id"></span></div>'

            html += '<div><input type="text" name="day['+ i +'][start_at]" class="form-control day-'+ i +'-start_at"><span class="invalid-feedback day-'+ i +'-start_at"></span></div>'

            html += '<div><input type="text" name="day['+ i +'][end_at]" class="form-control day-'+ i +'-end_at"><span class="invalid-feedback day-'+ i +'-end_at"></span></div>'

            html+= '<button type="button" class="btn btn-sm btn-remove"><i class="fa fa-remove"></i></button>'

            html+= '</div>'

            // var html = '<div class="form-group flex field added-field"><div><input type="text" name="day['+ i +'][working_day_id]" class="form-control day-'+ i +'-working_day_id"><span class="invalid-feedback day-'+ i +'-working_day_id"></span></div><div><input type="text" name="day['+ i +'][start_at]" class="form-control day-'+ i +'-start_at"><span class="invalid-feedback day-'+ i +'-start_at"></span></div><div><input type="text" name="day['+ i +'][end_at]" class="form-control day-'+ i +'-end_at"><span class="invalid-feedback day-'+ i +'-end_at"></span></div><button type="button" class="btn btn-sm btn-remove"><i class="fa fa-remove"></i></button></div>'

            addDynamicFields(totalFields, maxFields, html)
        })


        // Remove form fields dinamically
        $(document).on('click', '.btn-remove', function(){
            $(this).parent('div').remove()
        })

        // Store schedule
        $(document).on('click', '#storeSchedule', function()
        {
            var day = createScheduleArray('day', 3)
            var storeScheduleUrl = '/admin/working_days/' + profile

            $.ajax({
                url: storeScheduleUrl,
                type: "PATCH",
                data: {
                    day: day
                },
                success: function(response)
                {
                    $('#displaySchedule').load(location.href + ' #displaySchedule')
                    $('.btn-schedule').text('Change')

                    successResponse(createScheduleModal, response.message)
                },
                error: function(response)
                {
                    errorResponse(response.responseJSON.errors, createScheduleModal)
                }
            })
        })

    </script>
@endsection

