<nav class="col-md-2 d-none d-md-block bg-light sidebar p-0">

    <!-- Show sidebar -->
    <i class="fa fa-bars sidebar-toggle"></i>

    <div class="sidebar-sticky pt-0">
        <div id="adminDetails" class="flex">
            <div class="flex-1" id="displayUserAvatar">
                <img src="{{ asset(setAvatar(Auth::user())) }}" alt="" class="image img-responsive rounded-circle" style="width: 50px; height: 50px;">
            </div>

            <div class="flex-2">
                <p class="mb-12" id="displayUserName">
                    <b class="mr-18">{{ Auth::user()->name }}</b>
                </p>

                <p class="mb-12 fs-11">
                    <a href="{{ route('admin.settings') }}" class="mr-18">
                        <i class="fa fa-cog"></i> Settings
                    </a>
                </p>
            </div>
        </div>

        <ul class="nav flex-column mt-12">
            <li class="nav-item">
                <a class="nav-link  {{ set_active_link('dashboard', 2) }}" href="{{ route('admin.dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ set_active_link('accounts', 2) }}" href="{{ route('admin.accounts.list') }}">
                    <span data-feather="users"></span>
                    Accounts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ set_active_link('roles', 2) }}" href="{{ route('admin.roles.index') }}">
                    <span data-feather="briefcase"></span>
                    Roles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="shopping-cart"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                </a>
            </li>
        </ul>
    </div>
</nav>