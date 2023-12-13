<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="/assetstemplate/" data-template="vertical-menu-template-free">

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
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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
    @livewireStyles
</head>

<body>
    <style>
        .custom-swal-container {
            z-index: 10000;
        }

        .custom-swal-popup {
            z-index: 10001;
        }

        .custom-swal-backdrop {
            z-index: 10000;
        }
    </style>

    <div class="layout-wrapper layout-content-navbar" style="background-color: #f5f5f9">
        @yield('content')
        @include('partials.sidebar')
    </div>
    @include('sweetalert::alert')
    <script src="/assetstemplate/vendor/libs/jquery/jquery.js"></script>
    <script src="/assetstemplate/vendor/libs/popper/popper.js"></script>
    <script src="/assetstemplate/vendor/js/bootstrap.js"></script>
    <script src="/assetstemplate/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assetstemplate/vendor/js/menu.js"></script>
    <script src="/assetstemplate/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(e) {
                // Pastikan bahwa yang diklik memiliki id 'delete'
                if (e.target && e.target.id == 'delete') {
                    e.preventDefault();

                    let link = e.target.getAttribute('href');

                    Swal.fire({
                        title: "Anda Yakin?",
                        text: "Menghapus data",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#71dd37",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Hapus",
                        cancelButtonText: "Tidak",
                        customClass: {
                            container: 'custom-swal-container', 
                            popup: 'custom-swal-popup', 
                            backdrop: 'custom-swal-backdrop', 
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Lakukan penghapusan dengan mengarahkan ke URL penghapusan
                            window.location.href = link;
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
