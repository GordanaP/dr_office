@extends('layouts.admin')

@section('title', '| Admin | Profiles | Edit')

@section('content')
    @php
        $titles = array_keys(ProfileTitles::all());

        $titleArray = implode(',', $titles);
    @endphp

    {{ is_array($titleArray) }}


    <!-- Page title -->
    <div class="pb-2 col-md-12">
        <h2 class="admin-title-no-button">
            <span id="userProfileName" class="mr-3">
                {{ $user->profile->title }} {{ setFullName($user->profile->first_name, $user->profile->last_name) }}
            </span>

            <button type="button" class="btn btn-warning btn-link" id="editProfile"  data-name="{{ $user->name }}" value="{{$user->id }}">
                 Edit
            </button>
        </h2>
        <hr>
    </div>

    <div class="col-md-12">
        <div class="row">

            <!-- Avatar -->
            <div class="pb-2 col-md-3 text-center">
                @include('users.profiles.partials._avatar')
            </div>

            <!-- Profile -->
            <div class="pb-2 col-md-9"  style="padding-left: 70px;">
                @include('users.profiles.partials._card')
            </div>

        </div>
    </div>

    <!-- Modals -->
    @include('users.profiles.partials.modals._edit')
    @include('users.profiles.partials.modals._education')
    @include('users.avatars.partials.modals._edit')

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

        var educationModal = $('#educationModal'),
            educationForm = $('#educationForm'),
            educationFields = ['education']

        educationModal.setAutofocus('education')
        educationModal.emptyModal(educationFields)


        $(document).on('click', '#editEducation', function() {

            educationModal.modal('show');

            var user = $(this).attr('data-user')
            var showProfileUrl = '/admin/profiles/' + user

            $('.modal-title span').text('Education')
            $('#saveEducation').text('Save').val(user)

            $.ajax({
                url: showProfileUrl,
                type: "GET",
                success: function(response)
                {
                    var profile = response.profile

                    $('#edu').val(profile.education)
                }
            })
        });

        $(document).on('click', '#saveEducation', function(){

            var user = $(this).val()
            var updateProfileUrl = '/admin/profiles/' + user

            var education = $('#edu').val();

            var data = {
                'education': education
            }

            $.ajax({
                url: updateProfileUrl,
                type: 'PATCH',
                data: data,
                success: function(response) {

                    $('#userEducation').load(location.href + ' #userEducation')

                    successResponse(educationModal, response.message)
                },
                error: function(response) {
                    errorResponse(getJsonErrors(response), educationModal)
                }
            })
        })

    </script>
@endsection

