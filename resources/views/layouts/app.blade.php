<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylish-portfolio.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-lightshadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <a class="menu-toggle rounded" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
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
                            <a class="nav-link" href="{{ route('login') }}">{{ __('layout.login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('layout.register') }}</a>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('layout.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth
                        <li class="nav-item dropdown">
                            <a id="localDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ LaravelLocalization::getCurrentLocaleName() }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="localDropdown">
                                <ul>
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @auth
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu tree">
                    @if(Auth::user()->hasRole('Admin'))
                    <li class="treeview">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-files-o"></i>
                            <span>{{ __('layout.manageUser') }}</span>
                            <!-- <span class="pull-right-container">
                                <span class="label label-primary pull-right">4</span>
                            </span> -->
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-files-o"></i>
                            <span>{{ __('layout.manageRole') }}</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('products.index') }}">
                            <i class="fa fa-files-o"></i>
                            <span>{{ __('layout.manageProduct') }}</span>
                        </a>
                    </li>
                    @endif
                    <li class="treeview">
                        <a href="{{ route('contacts.index') }}">
                            <i class="fa fa-files-o"></i>
                            <span>{{ __('layout.manageContact') }}</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('file') }}">
                            <i class="fa fa-files-o"></i>
                            <span>{{ __('layout.fileUpload') }}</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('email') }}">
                            <i class="fa fa-files-o"></i>
                            <span>{{ __('layout.contact') }}</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        @endauth

        <main class="{{Auth::check() ? 'content-wrapper' : ''}}">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @yield('scripts')
</body>

</html>