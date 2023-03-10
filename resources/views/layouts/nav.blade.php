<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-lg-top">
    <div class="container">
        <a class="navbar-brand text-success fd-bold fs-3" href="{{ url('/') }}" >
            {{-- <img src="{{asset('img/logo.png')}}" alt="" srcset="" style="max-height: 40px;"> --}}
            {{ config('app.name', 'SMICAJ') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
            
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto fs-5">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#community">Community</a>

                </li> <li class="nav-item">
                    <a class="nav-link" href="#contact-us">Contact-us</a>

                </li>

                <li class="nav-item dropdown">
                    <a id="marketsDropDown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Markets
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="marketsDropDown">
                        <a class="dropdown-item" href="">
                            Stock
                        </a>
                        <a class="dropdown-item" href="">
                            Comodity
                        </a>
                    </div>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                     
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}">
                                {{ __('Dashboard') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
