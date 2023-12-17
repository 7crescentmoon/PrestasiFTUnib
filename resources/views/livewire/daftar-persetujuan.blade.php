<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y ">
        @include('partials.loading')
        <div class="card container overflow-hidden vh-100">
            <div class=" mt-3 d-flex justify-content-between align-items-center">
                <h3 class="text-primary fw-bold">
                    Daftar Persetujuan Prestasi</a>
                </h3>
            </div>
            <div class="mt-2 d-flex justify-content-between">
                @include('partials.dataTable')

                <div class="d-flex gap-2 align-items-center nav-item p-1 rounded" style="background-color: #e1e1e1">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none text-black" placeholder="Search..."
                        wire:model.live='search' class="bg-white" />
                </div>

            </div>
            <div class="my-3 overflow-auto vh-75">
                @php
                    $isEmpty = false;
                @endphp
                @foreach ($datas as $data)
                    @php
                        $isEmpty = true;
                    @endphp
                    <div class="card mt-2 mb-3 d-flex" style="background-color: #f4f4f4;">
                        <div class="card-body" >
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="img-wrap d-flex justify-content-center align-items-center" >
                                    @if ($data->user->profil)
                                        <img src="{{ asset('storage/' . $data->user->profil) }}" alt="user-avatar"
                                            class="d-block rounded" height="100" width="100"
                                            style="object-fit: cover; border: solid #cccc 2px" id="uploadedAvatar" />
                                    @else
                                        <img src="{{ asset('assets/img/user-profile-default.png') }}" alt="user-avatar"
                                            class="d-block rounded" height="100" width="100"
                                            style="object-fit: cover; border: solid #ccc 2px;" id="uploadedAvatar" />
                                    @endif

                                    <div class="content-left ms-5">
                                        <h5>{{ $data->user->nama }}</h5>
                                        <div class="d-flex align-items-end mt-2">
                                            <small>Kegiatan Perlombaan :
                                                </strong>{{ $data->nama_kegiatan_perlombaan }}</small>
                                        </div>
                                        <small>Tanggal pengajuan :
                                            
                                            </strong>{{ $data->created_at->toDateString() }}</small>
                                    </div>
                                </div>
                                <div class="">
                                    <a href="{{ route('dataPengajuan', encrypt($data->id)) }}" class="btn text-white"
                                        style="background-color: #696cff">lihat
                                        data</a>
                                </div>
                                @if (!$isEmpty)
                                    <div class="text-secondary w-100 d-flex justify-content-center align-items-center"
                                        style="opacity: 75%">
                                        <h4>-- Data pengajuan kosong --</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div wire:loading.remove>
                @endforeach
                @if (!$isEmpty)
                    <div class="text-secondary w-100 d-flex justify-content-center align-items-center"
                        style="opacity: 75%">
                        <h4>-- Data pengajuan kosong --</h4>
                    </div>
                @endif
            </div>
            <div class="paginate">
                @include('partials.paginate')
            </div>
        </div>
    </div>
</div>