<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    {{ env('APP_NAME') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.login') }}">
                                    {{ __('Login') }}
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="row justify-content-center">
                <div class="col-md-2 bg-dark header-space vh-100 pl-4">
                    <ul class="nav nav-pills nav-sidebar flex-column">
                        <li class="nav-item">
                            <a href="" class="p-2 btn btn-dark d-block">
                                企業管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="p-2 btn btn-dark d-block">
                                求人管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="p-2 btn btn-dark d-block">
                                タグ管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="p-2 btn btn-dark d-block">
                                職種管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="p-2 btn btn-dark d-block">
                                雇用形態管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="p-2 btn btn-dark d-block">
                                都道府県管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="p-2 btn btn-dark d-block">
                                給与形態管理
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 header-space">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
