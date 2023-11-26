<div class="content-wrapper ">
    @include('partials.loading')
    <div class="container-xxl mt-4 flex-grow-1  ">
        <div class="card">
            <div class="container mt-3 d-flex justify-content-between">
                <h3 class="">
                    <a href="{{ route('userList') }}" class=" text-secondary ">Daftar Pengguna / </a>
                    <a href="{{ route('adminList') }}" class=" ">Daftar Admin</a>
                </h3>
                <div class="">
                    <a href="{{ route('addUserView') }}" class="btn btn-success text-center">Tambah</a>
                    <button type="button" class="btn btn-secondary text-center" data-bs-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                            <path d="m12 16 4-5h-3V4h-2v7H8z"></path>
                            <path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href=""><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24"
                                style="fill: rgba(0, 0, 0, .5);transform: ;msFilter:;">
                                <path
                                    d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z">
                                </path>
                                <path
                                    d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319.254.202.426.533.426.923-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426.415.308.675.799.675 1.504 0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z">
                                </path>
                            </svg></i> unduh format pdf</a>

                        <a class="dropdown-item" href=""><svg xmlns="http://www.w3.org/2000/svg"
                                width="25
                            " height="24" style="fill: rgba(0, 0, 0, .5)"
                                class="bi bi-file-earmark-excel-fill" viewBox="0 0 18 18">
                                <path
                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z" />
                            </svg></i> unduh format excel</a>

                        <a class="dropdown-item" href=""><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24"
                                style="fill: rgba(0, 0, 0, .5);transform: ;msFilter:;">
                                <path
                                    d="M19 7h-1V2H6v5H5a3 3 0 0 0-3 3v7a2 2 0 0 0 2 2h2v3h12v-3h2a2 2 0 0 0 2-2v-7a3 3 0 0 0-3-3zM8 4h8v3H8V4zm0 16v-4h8v4H8zm11-8h-4v-2h4v2z">
                                </path>
                            </svg> Cetak</a>
                    </div>
                </div>


            </div>


            <div class="mt-2 mb-3 d-flex justify-content-between container">

                @include('partials.dataTable')

                <div class="d-flex gap-2 align-items-center nav-item p-1 rounded" style="background-color: #e1e1e1">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none text-black" placeholder="Search..."
                        wire:model.live='search' class="bg-white" />
                </div>
            </div>
            <div class="container my-2">
                <div class="table-responsive text-nowrap rounded mb-3">
                    <table class="table table table table-striped">
                        <thead class="table-secondary">
                            <tr style="color: rgb(23, 23, 23)8)">
                                <th class="fw-bold fs-6">No</th>
                                <th class="fw-bold fs-6">Nama</th>
                                <th class="fw-bold fs-6">NIP</th>
                                <th class="fw-bold fs-6">Email</th>
                                <th class="fw-bold fs-6">Gender</th>
                                <th class="fw-bold fs-6">Role</th>
                                <th class="fw-bold fs-6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($datas as $data)
                                <tr>
                                    <td class="text-secondary">{{ $loop->iteration }}</td>
                                    <td class="text-uppercase">
                                        <strong>{{ $data->nama }}</strong>
                                    </td>
                                    <td>{{ $data->npm_nip }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td>{{ $data->role }}</td>
                                    <td>

                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('editUserView', encrypt($data->id)) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>

                                            <a class="dropdown-item" onclick="return confirm('Hapus Data Pengguna ?')"
                                                href="{{ route('deleteUser', ['id' => $data->id]) }}"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginate">
                    @include('partials.paginate')
                 </div>
            </div>
        </div>
    </div>
</div>
