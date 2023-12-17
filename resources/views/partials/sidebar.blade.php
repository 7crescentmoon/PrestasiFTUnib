 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="text-center mt-2">
         <span>
            <a href="/">
                <img src="/assets/img/unib.png" style="width: 6rem; height: 6rem;" alt="">
            </a>
         </span>
         <div class="demo menu-text fw-bolder ms-2 d-block fs-3 mt-2"> UniAchive.FT</div>

         <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>
     <div class="menu-inner-shadow"></div>
     <ul class="menu-inner py-1">
         <!-- Dashboard -->
         @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
             <li class="menu-item {{ \Request::route()->getName() == 'adminDashboard' ? 'active' : '' }}">
                 <a href="{{ route('adminDashboard') }}" class="menu-link">
                     <i class="menu-icon tf-icons bx bx-home-circle"></i>
                     <div>Dashboard</div>
                 </a>
             </li>
         @endif

         @if (auth()->user()->role === 'user')
             <li class="menu-item {{ \Request::route()->getName() == 'userDashboard' ? 'active' : '' }}">
                 <a href="{{ route('userDashboard') }}" class="menu-link">
                     <i class="menu-icon tf-icons bx bx-home-circle"></i>
                     <div>Dashboard</div>
                 </a>
             </li>
         @endif

         <li class="menu-header small text-uppercase">

         </li>
         {{-- admin --}}
         @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
             @php
                 $allowedRoutes = ['daftarPengajuan', 'dataPengajuan'];
                 $isActive = in_array(\Request::route()->getName(), $allowedRoutes);
             @endphp
             <li class="menu-item {{ $isActive ? 'active' : '' }}">
                 <a href="{{ route('daftarPengajuan') }}" class="menu-link position-relative">
                     <i class='menu-icon bx bx-list-check'></i>
                     <div data-i18n="Layouts" class="">Persetujuan Prestasi
                         @if ($jumlah_pengajuan != 0)
                             <span
                                 class="badge bg-primary rounded-pill position-absolute d-flex justify-content-center align-items-center"
                                 style="top: -.5rem;right: -.3rem; width: 1.6rem; height: 1.5rem;">{{ $jumlah_pengajuan }}</span>
                         @endif
                     </div>
                 </a>
             </li>
         @endif
         @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
             @php
                 $allowedRoutes = ['viewTambahPrestasi','daftarPrestasi', 'dataMahasiswa'];
                 $isActive = in_array(\Request::route()->getName(), $allowedRoutes);
             @endphp
             <li class="menu-item {{ $isActive ? 'active' : '' }}">
                 <a href="{{ route('daftarPrestasi') }}" class="menu-link">
                     <i class='menu-icon bx bx-trophy'></i>
                     <div>Daftar Prestasi</div>
                 </a>

             </li>
         @endif

         @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
             @php
                 $allowedRoutes = ['userList', 'adminList', 'addUserView', 'addAdminView' ,'editUserView'];
                 $isActive = in_array(\Request::route()->getName(), $allowedRoutes);
             @endphp
             <li class="menu-item {{ $isActive ? 'active' : '' }}">
                 <a href="{{ route('userList') }}" class="menu-link">
                     <i class='menu-icon bx bxs-user-detail'></i>
                     <div>Daftar Pengguna</div>
                 </a>

             </li>
         @endif

         {{-- user --}}
         @if (auth()->user()->role === 'user')
             <li class="menu-item {{ \Request::route()->getName() == 'lamanPengajuan' ? 'active' : '' }}">
                 <a href="{{ route('lamanPengajuan') }}" class="menu-link">
                     <i class='menu-icon bx bx-notepad'></i>
                     <div data-i18n="Layouts">Pengajuan Prestasi</div>
                 </a>
             </li>
         @endif

         @if (auth()->user()->role === 'user')
             @php
                 $allowedRoutes = ['dataPrestasiMahasiswa','daftarPrestasiUser' ];
                 $isActive = in_array(\Request::route()->getName(), $allowedRoutes);
             @endphp
             <li class="menu-item  {{ $isActive ? 'active' : '' }}">
                 <a href="{{ route('daftarPrestasiUser') }}" class="menu-link">
                     <i class='menu-icon bx bx-trophy'></i>
                     <div data-i18n="Layouts">Prestasi anda</div>
                 </a>
             </li>
         @endif
         </li>
     </ul>
 </aside>