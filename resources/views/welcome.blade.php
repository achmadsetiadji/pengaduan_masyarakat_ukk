<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>LAPEMAS</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('frontend/img/logo.svg') }}" type="image/svg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-free/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nivo-lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

</head>

<body>

    <!-- Header Section Start -->
    <header id="home" class="hero-area">
        <div class="overlay">
            <span></span>
            <span></span>
        </div>
        <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
            <div class="container py-3">
                <a href="#" class="navbar-brand">
                    <img class="img-fluid mr-2"
                    src="{{ asset('frontend/img/logo.svg') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#tentang">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#panduan">Panduan</a>
                        </li>
                        <li class="nav-item">
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-singin" href="/login">Login<i class="fas fa-sign-in-alt ml-2"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row space-100">
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="contents">
                        <h2 class="head-title">LAPEMAS</h2>
                        <br>
                        <p>Aplikasi Laporan Pengaduan Masyarakat</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12 p-0">
                    <div class="intro-img">
                        <img src="{{ asset('frontend/img/header-illustration.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Blog Section -->
    <section id="tentang" class="section">
        <!-- Container Starts -->
        <div class="container">
            <!-- Start Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-text section-header text-center">
                        <div>
                            <h2 class="section-title">Apa fungsi LAPEMAS?</h2>
                            <div class="desc-text">
                                <p class="text-justify">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus earum, veniam eius molestiae ipsam deleniti voluptatibus reprehenderit laudantium blanditiis. Iusto voluptate numquam ratione, autem officia quia nihil. Repellat laboriosam modi voluptatibus consequatur neque natus culpa recusandae alias. Eligendi impedit asperiores ipsum, aliquam, itaque quod soluta consequuntur nesciunt maiores, obcaecati necessitatibus?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->
            <!-- Start Row -->
            <div class="row justify-content-center">

                <div class="col-lg-2 col-md-6 col-xs-12 mb-4 text-center">
                    <img class="img-fluid mb-2" src="{{ asset('frontend/img/icon/tulis.svg') }}" alt="">
                    <h6>Tulis Laporan</h6>
                    <p class="text-center icon-text">Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
                </div>

                <div class="col-lg-2 col-md-6 col-xs-12 mb-4 text-center">
                    <img class="img-fluid mb-2" src="{{ asset('frontend/img/icon/verifikasi.svg') }}" alt="">
                    <h6>Proses Verifikasi</h6>
                    <p class="text-center icon-text">Dalam 3 hari, laporan Anda akan diverifikasi</p>
                </div>

                <div class="col-lg-2 col-md-6 col-xs-12 mb-4 text-center">
                    <img class="img-fluid mb-2" src="{{ asset('frontend/img/icon/tindak-lanjut.svg') }}" alt="">
                    <h6>Proses Tindak Lanjut</h6>
                    <p class="text-center icon-text">Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda</p>
                </div>

                <div class="col-lg-2 col-md-6 col-xs-12 mb-4 text-center">
                    <img class="img-fluid mb-2" src="{{ asset('frontend/img/icon/selesai.svg') }}" alt="">
                    <h6>Selesai</h6>
                    <p class="text-center icon-text">Laporan Anda akan terus ditindaklanjuti hingga terselesaikan</p>
                </div>

            </div>
            <!-- End Row -->
        </div>
    </section>
    <!-- blog Section End -->

    <!-- Business Plan Section Start -->
    <section id="panduan">
        <div class="container">

            <div class="row">
                <!-- Start Col -->
                <div class="col-lg-6 col-md-12 pl-0 pt-70 pr-5">
                    <div class="business-item-img">
                        <div class="row justify-content-center">
                            <img src="{{ asset('frontend/img/panduan-illustration.svg') }}"
                                class="img-fluid" alt="">
                            <div class="col-12 mb-2">
                                <a class="btn btn-common-d-panduan" href="#">Download panduan (PDF)</a>
                            </div>
                            <div class="col-12">
                                <a class="btn btn-common-v-panduan" href="#">Lihat Panduan YouTube</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Col -->
                <!-- Start Col -->
                <div class="col-lg-6 col-md-12 pl-4">
                    <div class="business-item-info">
                        <h3>Panduan</h3>
                        <p class="text-justify">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet inventore, deleniti sed
                            delectus beatae magnam sunt magni iusto quod nobis dolorem optio, at excepturi in molestiae
                            rem aperiam recusandae? Nobis perferendis dolores laborum, quae voluptatibus reprehenderit
                            modi nesciunt ratione atque eaque, quam fugiat natus ad beatae ipsum repudiandae omnis enim
                            dolorem eius iure soluta ipsam veniam unde nihil? Nobis non, corrupti iusto possimus sed
                            sunt expedita, vel earum dolorum animi quod libero necessitatibus cupiditate alias atque,
                            reiciendis ea laudantium magni laboriosam in. Ratione eveniet asperiores illum, tenetur
                            temporibus, ducimus, fugiat officia a odit tempore natus repudiandae fuga blanditiis id ex.
                        </p>
                    </div>
                </div>
                <!-- End Col -->
            </div>
        </div>
    </section>
    <!-- Business Plan Section End -->

    <!-- Footer Section Start -->
    <footer>
        <!-- Footer Area Start -->
        <section id="footer-Content">
            <div class="container">
                <!-- Start Row -->
                <div class="row">

                    <!-- Start Col -->
                    <div class="col-lg-4 col-md-8 col-sm-8 col-xs-8 col-mb-12">
                        <div class="widget">
                            <h3 class="block-title">About LAPEMAS</h3>
                            <p class="text-justify">
                                LAPEMAS (Aplikasi Laporan Pengaduan Masyarakat) adalah aplikasi pengelolaan yang dibuat untuk tujuan "mengelola laporan Anda dengan mudah" dengan antarmuka yang mudah dinavigasi, waktu muat yang sangat ringan, dan interaksi responsif.
                            </p>
                        </div>
                    </div>
                    <!-- End Col -->

                    <!-- Start Col -->
                    <div class="col-lg-3 col-md-8 col-sm-8 col-xs-8 col-mb-12 offset-xl-1">
                        <div class="widget">
                            <h3 class="block-title">Links</h3>
                            <ul class="menu">
                                <li><a class="page-scroll" href="#home">- Home</a></li>
                                <li><a class="page-scroll" href="#tentang">- Tentang</a></li>
                                <li><a class="page-scroll" href="#panduan">- Panduan</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Col -->

                    <!-- Start Col -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                        <div class="widget mt-5">
                            <div class="subscribe-area float-right">
                                <img class="img-fluid" src="{{ asset('frontend/img/subscribe/tb.svg') }}" alt="">
                                <img class="img-fluid" src="{{ asset('frontend/img/subscribe/rpl.svg') }}" alt="">
                                <img class="img-fluid" src="{{ asset('frontend/img/subscribe/logo.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->

                </div>
                <hr>
                <!-- End Row -->
                <div class="row my-3">
                    <div class="col-lg-8">
                        <p class="p-small text-lg-left">LAPEMAS (Aplikasi Laporan Pengaduan Masyarakat)</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="p-small text-lg-right">
                            Direktorat Pelayanan Komunikasi Masyarakat © {{Date('Y')}}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer area End -->
    </footer>
    <!-- Footer Section End -->


    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="{{ asset('frontend/js/jquery-min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('frontend/js/scrolling-nav.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('frontend/js/nivo-lightbox.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>
