 <!-- Menu -->
 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <span>
             <img src="/assets/img/unib.png" style="width: 3rem; height: 3rem;" alt="">
         </span>
         <span class="app-brand-text demo menu-text fw-bolder ms-2"> UniAchive.FT</span>
         </a>

         <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">
         <!-- Dashboard -->
         @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
         <li class="menu-item">
             <a href="/dashboard/admin" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div data-i18n="Analytics">Dashboard</div>
             </a>
         </li>
         @endif

         @if (auth()->user()->role === 'user')
         <li class="menu-item">
             <a href="/dashboard" class="menu-link">
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
         <li class="menu-item ">
             <a href="" class="menu-link">
                 <i class='menu-icon bx bx-list-check'></i>
                 <div data-i18n="Layouts">Persetujuan Prestasi</div>
             </a>
         </li>
         @endif

         @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
         <li class="menu-item">
             <a href="" class="menu-link">
                 <i class='menu-icon bx bx-trophy'></i>
                 <div data-i18n="Account Settings">Daftar Prestasi</div>
             </a>

         </li>
         @endif

         @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
             <li class="menu-item">
                 <a href="" class="menu-link">
                     <i class='menu-icon bx bxs-user-detail'></i>
                     <div data-i18n="Authentications">Daftar Pengguna</div>
                 </a>

             </li>
         @endif

         {{-- user --}}
         @if (auth()->user()->role === 'user')
         <li class="menu-item ">
             <a href="" class="menu-link">
                <i class='menu-icon bx bx-notepad'></i>
                 <div data-i18n="Layouts">Pengajuan Prestasi</div>
             </a>
         </li>
         @endif

         @if (auth()->user()->role === 'user')
         <li class="menu-item ">
             <a href="" class="menu-link">
                <i class='menu-icon bx bx-trophy'></i>
                 <div data-i18n="Layouts">Prestasi anda</div>
             </a>
         </li>
         @endif

         

         </li>
     </ul>
 </aside>
 <!-- / Menu -->
