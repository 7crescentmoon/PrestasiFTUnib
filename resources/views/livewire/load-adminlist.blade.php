<div class="content-wrapper ">
    <div class="spinner-border text-success position-absolute top-50 start-50 z-3" wire:loading role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

    
    <div class="container-xxl mt-4 flex-grow-1  ">
        <div class="card">
            <div class="container mt-3">
                <h3 class="">
                    <a href="{{ route('userList') }}" class=" text-secondary ">Daftar Pengguna / </a>
                    <a href="{{ route('adminList') }}" class="text-promary ">Daftar Admin</a>
                </h3>
            </div>

            <div class="mt-2 mb-3 d-flex justify-content-between container">
                <div class="d-flex gap-2 align-items-center nav-item p-1 rounded">
                    <a href="{{ route('addUserView') }}" class="btn btn-success text-center"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 1 26 26"
                        style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                        <path
                            d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5zM19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2z">
                        </path>
                    </svg>
                    Tambah</a>
                </div>

                <div class="d-flex gap-2 align-items-center nav-item p-1 rounded" style="width: 24%">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none text-black" placeholder="Search..."
                        wire:model.live='search' style="background-color: #e1e1e1"/>
                </div>
            </div>
             
            <div class="table-responsive text-nowrap">
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
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-secondary">{{ $loop->iteration }}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $user->nama }}</strong>
                                </td>
                                <td>{{ $user->npm_nip }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->jenis_kelamin }}</td>
                                <td>{{ $user->role }}</td>
                                <td>

                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('editUserView', encrypt($user->id)) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>

                                        <a class="dropdown-item" onclick="return confirm('Hapus Data Pengguna ?')"
                                            href="{{ route('deleteUser', ['id' => $user->id]) }}"><i
                                                class="bx bx-trash me-1"></i> Delete</a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="paginate d-flex justify-content-center align-items-center mt-3">
            {{ $users->links() }}
        </div>
    </div>
</div>
