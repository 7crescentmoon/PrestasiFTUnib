 <!-- Menu -->
 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="text-center mt-2">
         <span>
             <img src="/assets/img/unib.png" style="width: 4rem; height: 4rem;" alt="">
         </span>
         <div class="app-brand-text demo menu-text fw-bolder ms-2 d-block"> UniAchive.FT</div>

         <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>
     <div class="menu-inner-shadow"></div>
     <ul class="menu-inner py-1">
         <!-- Dashboard -->
         @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
             <li class="menu-item">
                 <a href="{{ route('adminDashboard') }}" class="menu-link">
                     <i class="menu-icon tf-icons bx bx-home-circle"></i>
                     <div data-i18n="Analytics">Dashboard</div>
                 </a>
             </li>
         @endif

         @if (auth()->user()->role === 'user')
             <li class="menu-item">
                 <a href="{{ route('userDashboard') }}" class="menu-link">
                     <i class="menu-icon tf-icons bx bx-home-circle"></i>
                     <div data-i18n="Analytics">Dashboard</div>
                 </a>
             </li>
         @endif

         <li class="menu-header small text-uppercase">

         </li>

         <!-- Layouts -->
         {{-- active open --}}

         {{-- admin --}}
         @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
             <li class="menu-item">
                 <a href="{{ route('daftarPengajuan') }}" class="menu-link position-relative">
                     <i class='menu-icon bx bx-list-check'></i>
                     <div data-i18n="Layouts" class="">Persetujuan Prestasi
                         @if ($jumlah_pengajuan != 0)
                             <span
                                 class="position-absolute text-danger d-block justify-content-center align-items-center" style="top: 0;right: 1.5rem;">
                                 <p>{{ $jumlah_pengajuan }}</p>
                             </span>
                         @endif
                     </div>
                 </a>
             </li>
         @endif

         @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
             <li class="menu-item">
                 <a href="{{ route('daftarPrestasi') }}" class="menu-link">
                     <i class='menu-icon bx bx-trophy'></i>
                     <div data-i18n="Account Settings">Daftar Prestasi</div>
                 </a>

             </li>
         @endif

         @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
             <li class="menu-item">
                 <a href="{{ route('userList') }}" class="menu-link">
                     <i class='menu-icon bx bxs-user-detail'></i>
                     <div data-i18n="Authentications">Daftar Pengguna</div>
                 </a>

             </li>
         @endif

         {{-- user --}}
         @if (auth()->user()->role === 'user')
             <li class="menu-item ">
                 <a href="{{ route('lamanPengajuan') }}" class="menu-link">
                     <i class='menu-icon bx bx-notepad'></i>
                     <div data-i18n="Layouts">Pengajuan Prestasi</div>
                 </a>
             </li>
         @endif

         @if (auth()->user()->role === 'user')
             <li class="menu-item ">
                 <a href="{{ route('daftarPrestasiUser') }}" class="menu-link">
                     <i class='menu-icon bx bx-trophy'></i>
                     <div data-i18n="Layouts">Prestasi anda</div>
                 </a>
             </li>
         @endif



         </li>
     </ul>
 </aside>

 <!-- / Menu -->
