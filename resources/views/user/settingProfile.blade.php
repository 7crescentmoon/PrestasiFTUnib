@extends('admin.layouts.main')
@section('content')
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
                    <div class="">

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="card mb-4">
                                        <h5 class="card-header">Profile Details</h5>
                                        <!-- Account -->
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img src="../assets/img/avatars/1.png" alt="user-avatar"
                                                        class="d-block rounded" height="100" width="100"
                                                        id="uploadedAvatar" />
                                                    <div class="button-wrapper">
                                                        <label for="upload" class="btn btn-primary me-2 mb-4"
                                                            tabindex="0">
                                                            <span class="d-none d-sm-block">Upload photo</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload" class="account-file-input"
                                                                hidden accept="image/png, image/jpeg" />
                                                        </label>
                                                        <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 800K</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-0" />
                                            <div class="card-body">
                                                <form id="formAccountSettings" method="POST" onsubmit="return false">
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                                            <input class="form-control" type="text" id="namaLengkap"
                                                                name="namaLengkap" value="{{ $user->name }}" autofocus />
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="npm" class="form-label">Npm</label>
                                                            <input class="form-control" type="text" name="npm"
                                                                id="npm" value="{{ $user->npm }}" />
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="email" class="form-label">E-mail</label>
                                                            <input class="form-control" type="text" id="email"
                                                                name="email" value="{{ $user->email }}"
                                                                placeholder="john.doe@example.com" />
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="jurusan" class="form-label">jurusan</label>
                                                            <input class="form-control" type="text" id="jurusan"
                                                                name="jurusan" value="{{ $user->jurusan }}"
                                                                placeholder="john.doe@example.com" />
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="gender">Jenis Kelamin</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="text" id="gender" name="gender"
                                                                    class="form-control" value="{{ $user->gender }}"
                                                                    disabled />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Account -->
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-3 col-12 mb-0 d-flex justify-content-center">
                                                        <button type="submit"
                                                            class="btn btn-danger deactivate-account">Edit Profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
        @endsection
