<div class="content-wrapper mt-2 container">
    @include('partials.loading')
    <div class="container-xxl flex-grow-1  ">
        <!-- Layout -->
      
            <div class=" mb-3 d-flex justify-content-between">
                @include('partials.dataTable')
                <div class="d-flex gap-2 align-items-center nav-item p-1 rounded">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none text-black" placeholder="Search..."
                        wire:model.live='search' style="background-color: #e1e1e1" />
                </div>
            </div>
            @php
                $isEmpty = false;
            @endphp
            <div class="myline" style="height: 1px; border-top: 1px solid #ccc "></div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-secondary">
                        <tr style="color: rgb(23, 23, 23)">
                            <th class="fw-bold fs-6">No</th>
                            <th class="fw-bold fs-6">Nama</th>
                            <th class="fw-bold fs-6">Npm</th>
                            <th class="fw-bold fs-6">Prestasi</th>
                            <th class="fw-bold fs-6">Jurusan</th>
                            <th class="fw-bold fs-6">Jenis Prestasi</th>
                            <th class="fw-bold fs-6">Tingkat prestasi</th>
                            <th class="fw-bold fs-6">juara</th>
                        </tr>
                    </thead>
                    @foreach ($datas as $data)
                        @php
                            $isEmpty = true;
                        @endphp
                        <tbody class="table-border-bottom-0" wire:loading.remove>
                            <td class="text-secondary">{{ $loop->iteration }}</td>
                            <td class="text-secondary text-uppercase    ">{{ $data->user->nama }}</td>
                            <td class="text-secondary">{{ $data->user->npm_nip }}</td>
                            <td class="text-secondary">{{ $data->nama_prestasi }}</td>
                            <td class="text-secondary">{{ $data->user->jurusan }}</td>
                            <td class="text-secondary">{{ $data->jenis_prestasi }}</td>
                            <td class="text-secondary">{{ $data->pengajuan->tingkat_prestasi }}</td>
                            <td class="text-secondary">{{ $data->pengajuan->juara }}</td>
                        </tbody>
                    @endforeach
                </table>
                @if (!$isEmpty)
                <div class="text-secondary w-100 d-flex justify-content-center align-items-center mt-2" style="opacity: 75%">
                    <h4>--Data Prestasi kosong--</h4>
                </div>
            @endif
            </div>
      
    </div>
    <div class="paginate">
        @include('partials.paginate')
     </div>
    {{-- </div> --}}
</div>
