<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UniAchive.FT</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="/assets/favicon/favicon.ico" />


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assetsLandingPage/vendor/aos/aos.css" rel="stylesheet">
    <link href="assetsLandingPage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assetsLandingPage/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assetsLandingPage/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assetsLandingPage/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assetsLandingPage/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/assetsLandingPage/vendor/fonts/boxicons.css" />

    <!-- Template Main CSS File -->
    <link href="assetsLandingPage/css/style.css" rel="stylesheet">
    @livewireStyles
</head>

<body>
    @yield('content')
    @include('landingPage.layout.navbar')


    <!-- Vendor JS Files -->
    <script src="assetsLandingPage/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assetsLandingPage/vendor/aos/aos.js"></script>
    <script src="assetsLandingPage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assetsLandingPage/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assetsLandingPage/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assetsLandingPage/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assetsLandingPage/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assetsLandingPage/js/main.js"></script>
    @livewireScripts
</body>

</html>
