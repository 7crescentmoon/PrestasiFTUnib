@extends('landingPage.layout.main')
@section('content')
    <section id="home" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up" class="text-white text-center">Selamat Datang di UniAchive.FT</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400" class="text-center text-white"> " Menjadi Saksi Perjalanan
                        Gemilang Mahasiswa Berprestasi Fakultas Teknik "</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start d-flex justify-content-center align-items-center">
                            <a href="#prestasi"
                                class="text-center btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Lihat Prestasi</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <main id="main">
        <section id="prestasi" class="prestasi">

            <div class="container">
                <header class="section-header" data-aos="fade-down" data-aos-duration="10">
                    <h2>Daftar Prestasi</h2>
                </header>
                <div class="row gx-0">
                    @livewire('table-landingPage')
                </div>
            </div>

        </section>
    </main>

    <footer id="footer" class="footer">

        <section class="footer-top">
            <div class="container">
                <div class="row gy-4 justify-content-between">

                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="assets/img/unib.png" class="mb-" alt="">
                            <span>UniAchive.FT</span>
                        </a>
                        <p>Fakultas Teknik Universitas Bengkulu telah mendapatkan Prestasi dalam berbagai bidang, baik dalam
                            skala Nasional maupun Internasional</p>
                        <div class="social-links mt-3">
                            <a href="https://twitter.com/humasftunib" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="https://web.facebook.com/Fakultas-Teknik-Unib-105643147871160" class="facebook"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/ftunib_official/" class="instagram"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UCIhBva6-_i9qwBm6uGTXPKw" class="linkedin"><i
                                    class="bi bi-youtube"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6 footer-links">
                        <h4>Program Studi</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i>Informatika</li>
                            <li><i class="bi bi-chevron-right"></i>Teknik Sipil</li>
                            <li><i class="bi bi-chevron-right"></i>Teknik Elektro</li>
                            <li><i class="bi bi-chevron-right"></i>Teknik Mesin</li>
                            <li><i class="bi bi-chevron-right"></i>Arsitektur</li>
                            <li><i class="bi bi-chevron-right"></i>Sistem Informasi</li>
                        </ul>
                    </div>


                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start ">
                        <h4>Alamat</h4>
                        <p>
                            DEKANAT FAKULTAS TEKNIK<br>
                            Universitas Bengkulu<br>
                            Jalan WR. Supratman Kandang Limun <br>
                            Kec. Muara Bangkahulu<br>
                            Kota Bengkulu. 38371A INDONESIA<br>
                            <strong>Email:</strong> <strong>ft@unib.ac.id</strong><br>
                        </p>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7962.476206142751!2d102.2693069412011!3d-3.7582708348623926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36b1c0136b63bd%3A0xcfdfb38a76cae956!2sDekanat%20Fak.Teknik%20UNIB!5e0!3m2!1sid!2sid!4v1700484032507!5m2!1sid!2sid"
                            width="200" height="100" style="border:2px #ccc solid;" class="rounded" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>
                </div>
            </div>
        </section>
        <div class="container-xxl d-flex flex-wrap py-2 flex-md-row flex-column">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            . <b> UniAchive.FT</b>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
