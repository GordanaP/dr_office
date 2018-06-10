@extends('layouts.admin')

@section('title', '| Admin | Profiles | Edit')

@section('content')


    <!-- Page title -->
    <div class="pb-2 col-md-12">
        <h2 class="admin-title-no-button">
            <span id="userProfileName">
                {{ setFullName($user->profile->first_name, $user->profile->last_name) }}
            </span>
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
    @include('users.avatars.partials.modals._edit')

@endsection

@section('scripts')
    <script>

        // Profile
        var profileModal = $('#profileModal')
        var profileForm = $('#adminProfileForm')
        var profileFields = ['title', 'first_name', 'last_name']

        profileModal.setAutofocus('profileName')
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


    </script>
@endsection

