@extends('layouts.admin')

@section('title', '| Admin | Roles')

@section('content')

    @component('components.admin.main')
        @slot('title')
            <span>Roles</span>
            <button class="btn btn-warning" id="createRole">New role</button>
        @endslot

        @slot('class')
            justify-between
        @endslot

        @slot('content')
            @include('users.roles.partials._cards', ['roles' => $roles])
        @endslot
    @endcomponent

    <!-- Role Modal -->
    @include('users.roles.partials._modal')

@endsection

@section('scripts')
    <script>

        var rolesIndexUrl = "{{ route('admin.roles.index') }}"
        var roleModal = $('#roleModal')
        var roleForm = $('#roleForm')
        var roleName = $('#name')
        var roleFields = ['name']

        roleModal.setAutofocus(roleName)
        roleModal.emptyModal(roleFields)

        // Create role
        @include('users.roles.js._create')

        // Edit role
        @include('users.roles.js._edit')

        // Store role
        @include('users.roles.js._store')

        // Edit role
        @include('users.roles.js._update')

        // Delete role
        @include('users.roles.js._delete')

    </script>
@endsection