<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>UniAchive.FT</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/assetstemplate/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assetstemplate/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assetstemplate/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assetstemplate/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assetstemplate/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/assetstemplate/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assetstemplate/js/config.js"></script>

    <style>
        body {
            font-family: "Open Sans", sans-serif;
            background-color: white;
            color: black;
            overflow: visible !important;
            /* Ganti overflow: hidden menjadi overflow: visible */
        }

        *,
        h6,
        h5,
        h4 {
            color: black;
        }

        p {
            margin: 0;
        }

        hr {
            height: 5px;
            background-color: black;
        }


        .info-label {
            min-width: 110px;
            /* Sesuaikan lebar sesuai kebutuhan */
            display: inline-block;
        }


        @media print {

            /* Menghilangkan tampilan scrollbar pada halaman cetak */
            body {
                overflow: visible !important;
            }

            /* Menampilkan konten yang tersembunyi di dalam overflow */
            .table-responsive {
                overflow: visible !important;
            }
        }
    </style>
</head>

<body class="">
    <div class="d-flex justify-content-center flex-column  align-items-center " style="position: relative;">
        <img src="/assets/img/unib.png" style="width: 5vw">
        <p class="fw-bold mt-3" style="font-size: .9rem">UNIVERSITAS BENGKULU</p>
        <p class="fw-bold mt-1" style="font-size: 2rem">FAKULTAS TEKNIK</p>
    </div>


    <div class="my-line my-3" style="border: 1px solid black"></div>

    <div class="row text-center my-3">
        {{-- @dd($jenisJurusan) --}}
        <h5 class="fw-bold text-uppercase text-decoration-underline">Daftar Mahasiswa Berprestasi</h5>
    </div>

    <div class="mb-3">
        @if ($jenisJurusan)
            <p class="mb-1" style="font-size: .9rem; text-transform: uppercase">
                <span class="info-label" style="font-size: .9rem">Jurusan</span> : {{ $jenisJurusan }}
            </p>
        @endif
        @if ($jenisJurusan)
            <p class="mb-1" style="font-size: .9rem ;text-transform: uppercase">
                <span class="info-label" style="font-size: .9rem">Jenis Prestasi</span> : {{ $jenisPrestasi }}
            </p>
        @endif

    </div>

    <div class="table-responsive text-nowrap rounded">
        <table class="table">
            <thead>
                <tr>
                    <th class="fw-bold" style="font-size: .9rem">No</th>
                    <th class="fw-bold" style="font-size: .9rem">Nama</th>
                    <th class="fw-bold" style="font-size: .9rem">Npm</th>
                    @if (!$jenisJurusan)
                        <th class="fw-bold" style="font-size: .9rem">Jurusan</th>
                    @endif
                    <th class="fw-bold" style="font-size: .9rem">Nama Prestasi</th>

                    <th class="fw-bold" style="font-size: .9rem">Jenis Perlombaan</th>

                    <th class="fw-bold" style="font-size: .9rem">Tingkat Prestasi</th>
                    <th class="fw-bold" style="font-size: .9rem">Juara</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->nama }}</td>
                        <td>{{ $data->user->npm_nip }}</td>
                        @if (!$jenisJurusan)
                            <td>{{ $data->user->jurusan }}</td>
                        @endif
                        <td>{{ $data->nama_prestasi }}</td>

                        <td>{{ $data->pengajuan->jenis_perlombaan }}</td>

                        <td>{{ $data->pengajuan->tingkat_prestasi }}</td>
                        <td>{{ $data->pengajuan->juara }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();
        });
    </script>

</body>

</html>
