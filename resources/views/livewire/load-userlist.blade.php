<div class="layout-container">
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper position-relative">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y ">
                <!-- Layout -->
                <div class="mb-3">
                    <a href="{{ route('addUserView') }}" class="btn btn-success text-center"><i
                            class='bx bx-user-plus'></i> Tambah Pengguna</a>
                </div>
                <div wire:loading>
                    <!-- Pesan Loading -->
                    <h1>Loading...</h1>
                </div>
                <div class="card">
                    <h5 class="card-header">
                        <a href="{{ route('userList') }}" class=" link-primary">Daftar Pengguna</a>
                        @if (auth()->user()->role == 'super admin')
                            <a href="{{ route('adminList') }}" class=" link-dark">/ Daftar Admin</a>
                        @endif
                    </h5>

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Npm</th>
                                    <th>Email</th>
                                    <th>Jurusan</th>
                                    <th>Gender</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" wire:loading.remove>
                                @foreach ($users as $user)
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{ $user->nama }}</strong>
                                        </td>
                                        <td>{{ $user->npm_nip }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->jurusan }}</td>
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

                                                <a class="dropdown-item" data-confirm-delete="true"
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
                <!-- / Content -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
