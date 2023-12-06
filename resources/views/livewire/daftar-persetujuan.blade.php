<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y ">
        <!-- Layout -->
        @include('partials.loading')
        <div class="card container overflow-hidden vh-100">
            <div class=" mt-3 d-flex justify-content-between align-items-center">
                <h3 class="text-primary">
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
                    <div class="card mt-2 mb-2 d-flex" style="background-color: #efeded">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="img-wrap d-flex justify-content-center align-items-center">
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
                                        <h5><strong>Nama : </strong>{{ $data->user->nama }}</h5>
                                        <div class="d-flex align-items-end mt-2">
                                            <small><strong>Kegiatan Perlombaan :
                                                </strong>{{ $data->nama_kegiatan_perlombaan }}</small>
                                        </div>
                                        <small><strong>Tanggal pengajuan :
                                            
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

{{-- <div class=" gap-4 row flex-wrap">
    @php
        $isEmpty = false;
    @endphp
    @foreach ($datas as $data)
        @if ($data->status == 0)
            @php
                $isEmpty = true;
            @endphp
            <div class="card col-3 container d-flex mt-3" style="width: 23%; background-color: #ededed">
                <div class="card-body">
                    <div class="img-wrap d-flex justify-content-center align-items-center mb-3">
                        @if ($data->user->profil)
                            <img src="{{ asset('storage/' . $data->user->profil) }}" alt="user-avatar"
                                class="d-block rounded border" height="100" width="100"
                                style="object-fit: cover;" id="uploadedAvatar" />
                        @else
                            <img src="{{ asset('assets/img/user-profile-default.png') }}" alt="user-avatar"
                                class="d-block rounded border" height="100" width="100"
                                style="object-fit: cover;" id="uploadedAvatar" />
                        @endif
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
            </div wire:loading.remove>
        @endif
    @endforeach
    @if (!$isEmpty)
        <div class="text-secondary w-100 d-flex justify-content-center align-items-center" style="opacity: 75%">
            <h4>-- Data pengajuan kosong --</h4>
        </div>
    @endif
</div> --}}
{{-- <div class="paginate d-flex justify-content-end align-items-center mt-2">
    {{ $datas->links() }}
</div> --}}
