<div class="layout-container">
    <!-- Layout container -->
    {{-- style="background-color: #f5f5f9 --}}
    <div class="layout-page">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- / Navbar -->
        <!-- Content wrapper -->
        <!-- Content -->
        <div class="container-p-y">

            <div class="container navbar-nav mt-3">
                <div class="bg-white d-flex align-items-center nav-item p-1 rounded" style="width: 24%">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                        aria-label="Search..." />

                </div>
            </div>
            <div class="container-xxl container-p-y gap-3 d-flex flex-wrap ">
                <!-- Layout -->

                @foreach ($datas as $data)
            
                    @if ($data->status == 0)
                        <div class="card d-flex" style="width: 24%">
                            <div class="card-body">
                                <div class="img-wrap d-flex justify-content-center align-items-center mb-3">
                                    <img src="{{ asset('storage/' . $data->user->profil) }}" alt="user-avatar"
                                        class="d-block rounded border" height="100" width="100"
                                        style="object-fit: cover;" id="uploadedAvatar" />
                                </div>
                                <small class="text-center d-block text-black fs-bold">tanggal pengajuan</small>
                                <small class="text-center d-block">{{ $data->created_at }}</small>
                                <div class="myline mt-2" style="height: 1px; border-top: 1px solid #ccc "></div>
                                <div class="">
                                    <small class="text-secondary ">Nama Mahasiswa :</small>
                                    <p class="card-title text-black mt-2 ">{{ $data->user->nama }} <i
                                            class="fs-6">({{ $data->user->npm_nip }})</i></p>
                                    <div class="myline my-2" style="height: 1px; border-top: 1px solid #ccc "></div>

                                    <small class=" text-secondary ">Kegiatan Perlombaan :</small>
                                    <p class="card-tex text-black mt-2">
                                        {{ Str::limit($data->nama_kegiatan_perlombaan, 25) }}</p>
                                    <div class="myline" style="height: 1px; border-top: 1px solid #ccc "></div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('dataPengajuan', encrypt($data->id)) }}"
                                        class="btn btn-primary mt-3">lihat
                                        data</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
</div>
