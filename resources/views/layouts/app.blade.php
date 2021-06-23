<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Add Flag CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css"
        integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Add font awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
    <style>
        .icon {
            width: 30px;
            height: 25px;
            font-size: 20px;
            /* margin-bottom:10px; */
        }
        input[type="search"]{
            width: 100%;
            height: 40px;
            /* background: none; */
            border:none;
            /* border-bottom: 1px solid #fff; */
            /* outline:none; */
            color: wheat;
            font-size: 20px;
            padding: 20px;
        }
        input[type="search"]:focus{
            /* background: none;
            border:none;
            border-bottom: 1px solid #fff;
            outline:none;
            cursor: text;
            color: wheat;
            font-size: 20px; */
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md fixed-top w-100 shadow-sm" style="background: #37517E;">
            <div class="container">
                <a class="navbar-brand text-white" href="/">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                   {{ __('Notes Management')}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item ml-3 active">
                            <a class="nav-link text-white " href="{{route('home')}}">{{ __('home') }}</a>
                        </li>
                            <li class="nav-item ml-3">
                                <a class="nav-link text-white" href="{{route('pages.index')}}">{{ __('Pages') }}</a>
                            </li>
                            <li class="nav-item ml-3">
                                <a class="nav-link text-white" href="{{route('notes_only.index')}}">{{ __('Notes Only') }}</a>
                            </li>
                            <li class="nav-item ml-3">
                                <a class="nav-link text-white" href="{{route('tasks.index')}}">{{ __('Tasks') }}</a>
                            </li>
                            {{-- <li class="nav-item ml-3">
                              <input type="search" name="" id="" class="" placeholder="Enter Search Any Notes">
                              <i class="fas fa-search"></i>
                            </li> --}}
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class=" btn btn-link border-0 dropdown-toggle text-white" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="margin-top:3px;text-decoration:none; ">

                                @if (LaravelLocalization::getCurrentLocaleName() == 'Arabic')
                                    <span class="flag-icon flag-icon-sy icon mr-3"></span> {{ __('Arabic') }}
                                @elseif(LaravelLocalization::getCurrentLocaleName() == "English")
                                    <span class="flag-icon flag-icon-us icon mr-3"></span>{{ __('English') }}
                                @endif

                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        @if ($properties['native'] == 'English')
                                            <span class="flag-icon flag-icon-us mr-3"></span>
                                        @elseif(($properties['native']) == "العربية")
                                            <span class="flag-icon flag-icon-sy mr-3"></span>
                                        @endif
                                        <span class="float-right">{{ $properties['native'] }}</span>
                                    </a>

                                @endforeach
                            </div>
                        </li>
                        @endauth
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                    style="color: wheat">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest


                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
