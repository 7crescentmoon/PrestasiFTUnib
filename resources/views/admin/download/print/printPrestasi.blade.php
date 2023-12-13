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
    <div class="d-flex justify-content-center gap-5 align-items-center  mt-5" style="position: relative;">
        <div class="" style="position: absolute; left: 2rem;">
            <img src="/assets/img/unib.png" width="120px">
        </div>
        <div class="text-center ms-5">
            <p style="font-size: 1rem " class="mb-1">KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</p>
            <p class="fw-bold mb-1" style="font-size: 1rem ">UNIVERSITAS BENGKULU</p>
            <p style="font-size: 0.8rem">Jalan W.R. Supratman Kandang Limun Bengkulu 38371</p>
            <p style="font-size: 0.8rem"> Telepon : (0736) 344087, 22105 – 227</p>
        </div>
    </div>


    <div class="my-line my-4" style="border: 2px solid black"></div>

    <div class="row text-center">
        <h4 class="fw-bold">Daftar Pengguna</h4>
    </div>

    <div class="table-responsive text-nowrap rounded">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="fw-bold">No</th>
                    <th class="fw-bold">Nama</th>
                    <th class="fw-bold">Npm</th>
                    <th class="fw-bold">Jurusan</th>
                    <th class="fw-bold">Nama Prestasi</th>
                    <th class="fw-bold">Jenis Prestasi</th>
                    <th class="fw-bold">Tingkat Prestasi</th>
                    <th class="fw-bold">Juara</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                    
                <tr>
                    <th >{{ $loop->iteration }}</th>
                    <td>{{ $data->user->nama }}</td>
                    <td>{{ $data->user->npm_nip }}</td>
                    <td>{{ $data->user->jurusan }}</td>
                    <td>{{ $data->nama_prestasi }}</td>
                    <td>{{ $data->jenis_prestasi }}</td>
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
