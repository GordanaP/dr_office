@extends('layouts.admin')

@section('title', '| Admin | Accounts')

@section('links')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />
@endsection

@section('content')

    @component('components.admin.main')
        @slot('title')
            <span>Accounts</span>
            <button class="btn btn-warning text-uppercase" id="createAccount">New account</button>
        @endslot

        @slot('content')
            @include('users.accounts.partials.tables._html')
        @endslot
    @endcomponent

    @can('access', 'App\User')
        @include('users.accounts.partials.modals._create')
        @include('users.accounts.partials.modals._edit')
        @include('users.accounts.partials.modals._revokeRoles')
        @include('users.profiles.partials.modals._edit')
        @include('users.avatars.partials.modals._edit')
    @endcan

@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>

        var table = $('#accountsTable')

        // ACCOUNT
        var adminAccountsUrl = "{{ route('admin.accounts.index') }}"
        var accountFields = ['role_id', 'name', 'email', 'password']

        // Create account
        var createAccountModal = $('#createAccountModal')
        var createAccountForm = $('#createAccountForm')
        var auto_password = $('#auto_password')
        var password = $("#password")
        password.hide()

        createAccountModal.setAutofocus('role_id')
        createAccountModal.emptyModal(accountFields, createAccountForm, auto_password, password)

        // Edit account
        var editAccountModal = $('#editAccountModal')
        var editAccountForm = $('#editAccountForm')
        var _unchanged_password = $('#_unchanged_password')
        var _password = $("#_password")
        _password.hide()

        editAccountModal.setAutofocus('_role_id')
        editAccountModal.emptyModal(accountFields, editAccountForm, _unchanged_password, _password)

        // Revoke roles
        var revokeRolesModal = $('#revokeRolesModal')
        var revokeRolesForm = $('#revokeRolesForm')
        var revokeFields = ['role_id']

        revokeRolesModal.emptyModal(revokeFields, revokeRolesForm)

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

        avatarModal.setAutofocus('avatar_options')
        avatarModal.emptyModal(avatarFields, avatarForm)


        // Datatable
        @include('users.accounts.partials.tables._datatable')

        // Edit user roles
        @include('users.accounts.js._editRoles')

        // Revoke user role(s)
        @include('users.accounts.js._revokeRoles')

        // Create account
        @include('users.accounts.js._create')

        // Store account
        @include('users.accounts.js._JSvalidationStore')

        // Edit account
        @include('users.accounts.js._edit')

        // Update account
        @include('users.accounts.js._JSvalidatationUpdate')

        // Delete account
        @include('users.accounts.js._delete')

        // Edit profile
        @include('users.profiles.js._edit')

        // Save profile
        @include('users.profiles.js._JSvalidation')

        // Delete profile
        @include('users.profiles.js._delete')

        // Edit Avatar
        @include('users.avatars.js._edit')

        // Save Avatar
        @include('users.avatars.js._JSvalidate')

    </script>

@endsection