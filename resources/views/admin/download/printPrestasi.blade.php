<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        body {
            font-family: arial;
            background-color: white;
            color: black;
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
            background-color: black
        }
    </style>
</head>

<body>
    <div class="row ">
        <div class="col-2 text-center">
            <img src="/assets/img/unib.png" width="140px">
        </div>
        <div class="col-10 text-center">
            <p>KEMENTRIAN RISET TEKNOLOGI DAN PENDIDIKAN TINGGI</p>
            <p>UNIVERSITAS BENGKULU</p>
            <p>FAKULTAS TEKNIK</p>
            <p>PROGRAM STUDI INFORMATIKA</p>
            <p>Jalan W.R. Supratman Kandang Limun Bengkulu</p>
            <p>Bengkulu 38371 A Telepon : (0736) 344087, 22105 – 227</p>
        </div>
    </div>
    <hr>

    <div class="row text-center">
        <h4>Daftar Pengguna</h4>
    </div>

    <div class="row text-center mb-4">

    </div>

    <div class="table-responsive ">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Npm</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Nama Prestasi</th>
                    <th scope="col">Jenis Prestasi</th>
                    <th scope="col">Tingkat Prestasi</th>
                    <th scope="col">Juara</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                    
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                       {{ $data->user->nama }}
                    </td>
                    <td>
                       {{ $data->user->npm_nip }}
                    </td>
                    <td>{{ $data->user->jurusan }}</td>
                    <td>
                        {{ $data->nama_prestasi }}
                    </td>
                    <td>
                        {{ $data->jenis_prestasi }}
                    </td>
                    <td>
                        {{ $data->pengajuan->tingkat_prestasi }}
                    </td>
                    <td>
                        {{ $data->pengajuan->juara }}
                    </td>
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
