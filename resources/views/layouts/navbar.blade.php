<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">Notes</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">{{__('Home')}}</a></li>
          <li><a class="nav-link scrollto" href="#about">{{__('About')}}</a></li>
          <li><a class="nav-link scrollto" href="#services">{{__('Services')}}</a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">{{__('Portfolio')}}</a></li>
          <li><a class="nav-link scrollto" href="#team">{{__('Team')}}</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">{{ __('Team')}}</a></li>
          <li><a class="getstarted scrollto" href="/home">{{__('Get Started')}}</a></li>
          @guest
          {{-- <li class="nav-item">
              <a class="nav-link scrollto" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li> --}}
          @if (Route::has('register'))
              {{-- <li class="nav-item">
                  <a class="nav-link scrollto" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li> --}}
          @endif
        @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link scrollto dropdown-toggle" href="#" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
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
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
