<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="/assetstemplate/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta name="description" content="" />

    <title>UniAchive.FT</title>

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
    <!-- Page -->
    <link rel="stylesheet" href="/assetstemplate/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="/assetstemplate/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assetstemplate/js/config.js"></script>
    @livewireStyles
</head>

<body style="background-color: #f5f5f9">
    <!-- Content -->

    <div class="container-xxl">
        @yield('content')
        @include('sweetalert::alert')
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assetstemplate/vendor/libs/jquery/jquery.js"></script>
    <script src="/assetstemplate/vendor/libs/popper/popper.js"></script>
    <script src="/assetstemplate/vendor/js/bootstrap.js"></script>
    <script src="/assetstemplate/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assetstemplate/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="/assetstemplate/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @livewireScripts
</body>

</html>
