<form id="dataForm" method="POST" action="{{ route('dataPrestasi', $data) }}">
    @csrf
    <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title text-center" id="exampleModalLabel1">Masukan data Prestasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                {{-- <input type="hidden" name="status" value="{{ $data->pengajuan->prestasi }}"> --}}
                <input type="hidden" name="user_id" value="{{ intval($data->user->id) }}">
                {{-- <input type="hidden" name="pengajuan_id"  value="{{ intval($data->id) }}"> --}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama_prestasi" class="form-label fw-bold ">Nama Prestasi
                                Mahasiswa</label>
                            <input type="text" id="nama_prestasi"
                                class="form-control @error('nama_prestasi') is-invalid @enderror" name="nama_prestasi"
                                required />
                        </div>
                        @error('nama_prestasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col mb-3">
                        <label for="juara" class="form-label fw-bold">Jenis Perlombaan</label>
                        <input
                            class="form-control @error('juara') is-invalid @enderror"
                            value="{{ $data->jenis_perlombaan }}" disabled>
                    </div>

                    <div class="col mb-0">
                        <label for="jenis-prestasi" class="form-label fw-bold">Pilih Jenis Prestasi</label>
                        <select id="kategori" name="jenis_prestasi"
                            class="form-select @error('jenis_prestasi') is-invalid @enderror" name="jenis_prestasi"
                            required>
                            <option value="1">PILIH JENIS PRESTASI</option>
                            <option value="AKADEMIK">AKADEMIK</option>
                            <option value="NON AKADEMIK">NON AKADEMIK</option>
                        </select>
                    </div>

                    {{-- <div class="row g-2" id="prestasiAkademikRow" style="display: none;">
                        <div class="col mb-0">
                            <label for="jenis-prestasi" class="form-label fw-bold">PRESTASI AKADEMIK</label>
                            <select name="prestasiAkademik"
                                class="form-select @error('jenis_prestasi') is-invalid @enderror" name="jenis_prestasi"
                                >
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-2" id="prestasiNonAkademikRow" style="display: none;">
                        <div class="col mb-0">
                            <label for="jenis-prestasi" class="form-label fw-bold">PRESTASI NON AKADEMIK</label>
                            <select name="prestasiNonAkademik"
                                class="form-select @error('jenis_prestasi') is-invalid @enderror" name="jenis_prestasi"
                                >
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Kembali
                    </button>
                    <button type="submit" class="btn btn-success" id="sumbitData">Setujui</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>

</script>
