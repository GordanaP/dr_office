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

    @include('users.accounts.partials.modals._create')
    @include('users.accounts.partials.modals._edit')
    @include('users.accounts.partials.modals._revokeRoles')

@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>

        // initialize select.2
        $('select.role_id')
        .select2({
            placeholder: "Select role(s)",
            width: "100%"
        });

        var table = $('#accountsTable')

        // ACCOUNT
        var adminAccountsUrl = "{{ route('admin.accounts.index') }}"
        var accountFields = ['role_id', 'name', 'email', 'password']

        // Create account
        var createAccountModal = $('#createAccountModal')
        var createAccountForm = $('#createAccountForm')
        var roleId = $('#role_id')
        var auto_password = $('#auto_password')
        var password = $("#password")
        password.hide()

        createAccountModal.setAutofocus(roleId)
        createAccountModal.emptyModal(accountFields, auto_password, password)

        // Edit account
        var editAccountModal = $('#editAccountModal')
        var editAccountForm = $('#editAccountForm')
        var _roleId = $('#_role_id')
        var _unchanged_password = $('#_unchanged_password')
        var _password = $("#_password")
        _password.hide()

        editAccountModal.setAutofocus(_roleId)
        editAccountModal.emptyModal(accountFields, _unchanged_password, _password)

        // Revoke roles
        var revokeRolesModal = $('#revokeRolesModal')
        var revokeRolesForm = $('#revokeRolesForm')
        var revokeFields = ['role_id']

        revokeRolesModal.emptyModal(revokeFields)

        // Datatable
        @include('users.accounts.partials.tables._datatable')

        // Create account
        @include('users.accounts.js._create')

        // Store account
        @include('users.accounts.js._store')

        // Edit account
        @include('users.accounts.js._edit')

        // Update account
        @include('users.accounts.js._update')

        // Delete account
        @include('users.accounts.js._delete')

        // Edit user roles
        @include('users.accounts.js._editRoles')

        // Revoke user role(s)
        @include('users.accounts.js._revokeRoles')

    </script>

@endsection