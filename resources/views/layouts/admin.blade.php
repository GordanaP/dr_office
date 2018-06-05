<!doctype html>
<html lang="en">
    <head>
        @include('partials.top._header')

        <link rel="stylesheet" href="{{ asset('vendor/formvalidation/dist/css/formValidation.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

        @yield('links')
    </head>

    <body id="adminBody">

        <div id="app">

            @include('partials.admin._nav')

            <div class="container-fluid">
                <div class="row">

                    @include('partials.admin._side')

                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                        @yield('content')
                    </main>
                </div>
            </div>

        </div>

        @include('partials.bottom._footer')
        @include('partials.bottom._scripts')
        @include('partials.admin._scripts')
        @yield('scripts')

    </body>
</html>
