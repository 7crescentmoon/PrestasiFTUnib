<form id="dataForm" method="POST" action="{{ route('dataPrestasi') }}">
    @csrf
    <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title text-center" id="exampleModalLabel1">Masukan data Prestasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
              
                {{-- <input type="hidden" name="status" value="{{ $data->pengajuan->prestasi }}"> --}}
                <input type="hidden" name="status" value="{{ $data->status }}">
                <input type="hidden" name="user_id"  value="{{ intval($data->user->id) }}">
                <input type="hidden" name="pengajuan_id"  value="{{ intval($data->id) }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama_prestasi" class="form-label fw-bold">Nama Prestasi Mahasiswa</label>
                            <input type="text" id="nama_prestasi" class="form-control"
                                name="nama_prestasi" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="jenis-prestasi" class="form-label fw-bold"> JENIS PRESTASI</label>
                            <select id="jenis-prestasi" class="form-select" name="jenis_prestasi">
                                <option>Pilih jenis prestasi</option>
                                <option value="akademik">Prestasi Akademik</option>
                                <option value="non akademik">Prestasi Non Akademik</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="sumbitData">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>