<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 admin-navbar">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('index') }}">
        Company name
    </a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('logout') }}" class="fs-11"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
            >
                <i class="fa fa-sign-out"></i> Sign out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>