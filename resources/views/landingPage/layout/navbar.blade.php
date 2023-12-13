<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="" class="logo d-flex align-items-center">
            <img src="assets/img/unib.png" alt="" class="mb-2">
            <span id="logo-UniAchive">UniAchive.FT</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#home">Beranda</a></li>
                <li><a class="nav-link scrollto" href="#prestasi">Prestasi</a></li>
                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
                            <li><a class="getstarted scrollto" href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        @endif

                        @if (auth()->user()->role === 'user')
                            <li><a class="getstarted scrollto" href="{{ route('userDashboard') }}">Dashboard</a></li>
                        @endif
                    @else
                        <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                    @endauth
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
