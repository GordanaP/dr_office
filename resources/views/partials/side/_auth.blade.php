<p class="side-list-label">My account</p>

<ul class="list-group side-list">
    <li class="list-group-item side-list-group-item {{ set_active_link('myaccount', 2) }}">
        <a href="{{ route('users.accounts.edit') }}" class="ml-6">
            Edit account
        </a>
    </li>

    <li class="list-group-item side-list-group-item">
        @include('users.accounts.partials.forms._delete')
    </li>
</ul>

<p class="side-list-label">My profile</p>

<ul class="list-group side-list">
    <li class="list-group-item side-list-group-item {{ set_active_link('myprofile', 2) }}">
        <a href="{{ route('users.profiles.edit') }}" class="ml-6">
            {{ $user->profile ? 'Update' : 'Create' }} profile
        </a>
    </li>

    <li class="list-group-item side-list-group-item {{ set_active_link('myavatar', 2) }}">
        <a href="{{ route('users.avatars.edit') }}" class="ml-6">
            Change avatar
        </a>
    </li>
</ul>
