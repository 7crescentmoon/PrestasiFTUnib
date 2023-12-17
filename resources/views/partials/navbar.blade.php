<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme "
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <p class="navbar-nav align-items-center">{{ $carbon }}</p>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @if ($user_log->profil)
                            <img src="{{ asset('storage/' . $user_log->profil) }}" alt="user-avatar"
                                class="object-fit-cover w-px-35 h-px-35 rounded-circle"  style="object-fit: cover;"
                                />
                        @else
                            <img src="{{ asset('assets/img/user-profile-default.png') }}" alt="user-avatar"
                                class="object-fit-cover w-px-35 h-px-35 rounded-circle"  style="object-fit: cover;"
                               />
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @if ($user_log->profil)
                                            <img src="{{ asset('storage/' . $user_log->profil) }}" alt="user-avatar"
                                                class="d-block rounded border" height="100" width="100"
                                                style="object-fit: cover;" />
                                        @else
                                            <img src="{{ asset('assets/img/user-profile-default.png') }}"
                                                alt="user-avatar" class="d-block rounded border" height="100"
                                                width="100" style="object-fit: cover;" />
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ Str::limit(Auth::user()->nama, 10) }}</span>
                                    <small class="text-muted">{{ Auth::user()->role }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    @if (auth()->user()->role === 'user')
                        <li>
                            @if (\Request::route()->getName() === 'userProfile')
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">Profil</span>
                                </a>
                            @else
                                <a class="dropdown-item" href="{{ route('userProfile', encrypt($user_log->id)) }}">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">Profil</span>
                                </a>
                            @endif
                        </li>
                    @endif

                    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
                        <li>
                            @if (\Request::route()->getName() === 'adminProfile')
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">Profil</span>
                                </a>
                            @else
                                <a class="dropdown-item" href="{{ route('adminProfile', encrypt($user_log->id)) }}">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">Profil</span>
                                </a>
                            @endif
                        </li>
                    @endif

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form class="dropdown-item" action="/logout" method="POST">
                            @csrf
                            <i class="bx bx-power-off me-2"></i>
                            <button style="background: transparent; border: none; color: #697a8d"
                                class="">Keluar</button>
                        </form>
                    </li>

                    </a>
            </li>
        </ul>
        </li>
        <!--/ User -->
        </ul>
    </div>
</nav>
