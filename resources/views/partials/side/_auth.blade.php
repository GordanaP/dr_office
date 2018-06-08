<p class="side-list-label">My account</p>

<ul class="list-group side-list">
    <li class="list-group-item side-list-group-item {{ set_active_link('myaccount', 2) }}">
        <a href="{{ route('users.accounts.edit') }}" class="ml-6">
            Edit account
        </a>
    </li>
</ul>