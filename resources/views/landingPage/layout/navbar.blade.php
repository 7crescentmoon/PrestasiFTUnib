<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="" class="logo d-flex align-items-center">
            <img src="assets/img/unib.png" alt="" class="mb-2">
            <span id="logo-UniAchive">UniAchive.FT</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#home">Home</a></li>
                <li><a class="nav-link scrollto" href="#prestasi">Prestasi</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
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
{{-- 
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard/admin') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif --}}
