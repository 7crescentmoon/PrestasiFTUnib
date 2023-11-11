<div class="container-p-y">

    <div class="wrapper mx-4 ">
        <div class=" mt-3 d-flex justify-content-between">
            <h3 class="text-primary mt-3 " style="opacity: 75%">
                Daftar Persetujuan Prestasi</a>
            </h3>
            <div class="d-flex gap-2 align-items-center nav-item p-1 rounded" style="width: 24%">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none text-black" placeholder="Search..."
                    wire:model.live='search' style="background-color: #e1e1e1" />
            </div>
        </div>
        {{-- <div class="myline" style="height: 1px; border-top: 1px solid #ccc "></div> --}}
        <div class="spinner-border text-secondary position-absolute top-50 start-50 z-3" wire:loading role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="container-p-y gap-3 d-flex flex-wrap">
            @php
                $isEmpty = false;
            @endphp
            @foreach ($datas as $data)
                @if ($data->status == 0)
                    @php
                        $isEmpty = true;
                    @endphp
                    <div class="card d-flex" style="width: 24%; background-color: #ffff">
                        <div class="card-body ">
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
                    <h4>Data pengajuan kosong</h4>
                </div>
            @endif
        </div>
        <div class="paginate d-flex justify-content-center align-items-center mt-2">
            {{ $datas->links() }}
        </div>
    </div>

</div>
