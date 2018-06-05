@extends('layouts.admin')

@section('title', '| Admin | Roles')

@section('content')

    @component('components.admin.main')
        @slot('title')
            <span>Roles</span>
            <button class="btn btn-warning" id="createRole">New role</button>
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

        var roleModal = $("#roleModal")
        var roleForm = $("#roleForm")
        var rolesIndexUrl = "{{ route('admin.roles.index') }}"
        var roleFields = ['name']

        roleModal.setAutofocus('name')
        roleModal.emptyModal(roleFields, roleForm)

        // Create role
        @include('users.roles.js._create')

        // Edit role
        @include('users.roles.js._edit')

        // Store & update with client side validation
        @include('users.roles.js._JSvalidation')

        // Delete role
        @include('users.roles.js._delete')

    </script>
@endsection