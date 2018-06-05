@extends('layouts.admin')

@section('title', '| Admin | Settings')

@section('content')

    <div class="pb-2 col-md-12">
        <h2 class="admin-title-no-button">
            <span id="myProfileName">{{ optional($user->profile)->name ?: $user->name }}</span>
            <span class="muted"><small>admin</small></span>
        </h2>
        <hr>
    </div>

    <div class="row mt-24">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="pb-2 col-md-3 text-center">
                    @include('admin.settings.partials._avatar')
                </div>

                <div class="pb-2 col-md-9"  style="padding-left: 70px;">
                    @include('admin.settings.partials._card')
                </div>
            </div>
        </div>
    </div>

    @include('users.avatars.partials.modals._edit')
    @include('users.profiles.partials.modals._edit')
    @include('users.accounts.partials.modals._edit')

@endsection

@section('scripts')
    <script>

        var adminAccountsUrl = "{{ route('admin.accounts.index') }}"

        // Edit Account
        var editAccountModal = $('#editAccountModal')
        var editAccountForm = $('#editAccountForm')
        var accountFields = ['name', 'email', 'password']

        var _unchanged_password = $('#_unchanged_password')
        var _password = $("#_password")
        _password.hide()

        editAccountModal.setAutofocus('_role_id')
        editAccountModal.emptyModal(accountFields, editAccountForm, _unchanged_password, _password)

        // Profile
        var profileModal = $('#profileModal')
        var profileForm = $('#adminProfileForm')
        var profileFields = ['name', 'about', 'location']

        profileModal.setAutofocus('profileName')
        profileModal.emptyModal(profileFields, profileForm)

        // Avatar
        var avatarModal = $('#avatarModal')
        var avatarForm = $('#userAvatarForm')
        var avatarFields = ['avatar_options', 'avatar']
        var datatable

        avatarModal.setAutofocus('avatar_options')
        avatarModal.emptyModal(avatarFields, avatarForm)

        // Edit account
        @include('users.accounts.js._edit')

        // Update account
        @include('admin.settings.js._JSvalidation')

        // Edit profile
        @include('users.profiles.js._edit')

        // Update profile
        @include('users.profiles.js._JSvalidation')

        // Delete profile
        @include('users.profiles.js._delete')

        //Edit avatar
        @include('users.avatars.js._edit')

        // Update avatar
        @include('users.avatars.js._JSvalidate')

    </script>
@endsection

