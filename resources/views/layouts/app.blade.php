<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bulldog CMS</title>
    <link rel="icon" type="image/png" href="/bulldog-favicon.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
</head>
<body>
    <header class="header wrap-bg">
        <div class="row">
            <div class="col-6">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Bulldog CMS
                </a>
            </div>
            <div class="col-6">
                <nav class="nav nav-inline">
                    <ul>
                    @guest
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>  
                    @else
                        <li><a href="{{ route('pages.index') }}">Pages</a></li>
                        <li><a href="{{ route('blog.index') }}">Posts</a></li>

                        @can('manageUsers', App\User::class)
                            <li><a href="{{ route('users.index') }}">Users</a></li>
                        @endcan

                        <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a></li>
                    @endguest
                    </ul>
                </nav>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <main class="main">
        <section class="wrap">
            @yield('content')
        </section>
    </main>

    <footer class="wrap-bg">
        <p>Footer</p>
    </footer>  

</body>
</html>
