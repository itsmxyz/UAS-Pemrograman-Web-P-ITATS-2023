<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Millennium School</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!--Favicons-->
    <link rel="icon" href="https://cdn.discordapp.com/attachments/1104037318521798746/1104037992831664128/icon_img.png">
    <link href="{{asset('assets/img/apple-touch-icon.png" rel="apple-touch-icon')}}">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    @include('templates.cdn-link')

    <!--Vendor CSS Files-->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet')}}">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!--Main CSS File-->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo" id="logo"><a href="#">Millennium<span> School</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        {{--      <a href="" class="logo"><img src="https://cdn.discordapp.com/attachments/1104037318521798746/1104123752586956830/millenium.png" alt=""> Millennium School</a>--}}

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#tentang">Tentang Kami</a></li>
                <li><a class="nav-link scrollto" href="#stats">Statistik</a></li>
                <li><a class="nav-link scrollto" href="#klub">Klub</a></li>
                <li><a class="nav-link scrollto" href="#galeri">Galeri</a></li>
                <li><a class="nav-link scrollto" href="#kontak">Hubungi Kami</a></li>
                @if(auth()->guard('schale')||auth()->guard('sensei')||auth()->guard('sekretaris') )
                    <li><a class="nav-link scrollto" href="{{route('logout',['username'=>auth()->guard('sensei')->user()->username])}}">Logout</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" id="login">Login<i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/login">Sensei</a></li>
                            <li><a href="/login">Sekretaris</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<main id="main">
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Milennium<span> School</span></h1>
            <h2>The Kivotos city school specializing in science and technology! </h2>
            <div class="d-flex">
                <a href="#tentang" class="btn-get-started scrollto">Get Started</a>
                <a href="https://www.youtube.com/watch?v=-xHqglB973c" class="glightbox btn-watch-video"><i
                        class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
        </div>
    </section><!-- End Hero -->


    <!-- ======= About Section ======= -->
    <section id="tentang" class="about section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Tentang Kami</h2>
                <h3>Millennium Sience <span>School Academy</span></h3>
                <p>Satu dari Tiga Akademi besar di kota Kivotos yang sangat menjunjung keterampilan teknologi dan
                    Pengetahuan sains</p>
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <img src="https://cdn.discordapp.com/attachments/1104037318521798746/1109440287060787291/Millennium_Location.png"
                         class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up"
                     data-aos-delay="100">
                    <h3>Akademi yang berkontribusi besar dalam penemuan dan pengembangan di kota Kivotos.</h3>
                    <p class="fst-italic">
                        Kami sediakan fasilitas yang menunjang untuk penelitian para siswa.
                    </p>
                    <ul>
                        <li>
                            <i class="bi bi-emoji-smile"></i>
                            <div>
                                <h5>Millennium mendukung penuh penelitian siswa</h5>
                                <p>Kami sangat mendukung setiap penelitian siswa,
                                    Millennium akan memberikan semua fasilitas yang dibutuhkan untuk penelitian</p>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-shield-check"></i>
                            <div>
                                <h5>Millennium menjalankan protokol keamanan terbaik untuk setiap aktivitas penelitian
                                    siswa</h5>
                                <p>Kami mengutakan keselamatan yang dalam setiap aktivitas penelitian siswa</p>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-buildings"></i>
                            <div>
                                <h5>Millennium beroritentasi menjadi Akademi yang berkontribusi langsung terhadap
                                    kemajuan Teknologi</h5>
                                <p>Kami memberikan hasil penelitian dan pengembangan kami untuk kemajuan Teknologi di
                                    kota Kivotos tercinta</p>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="stats" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>
                        <span data-purecounter-start="0"
                              data-purecounter-end=142 data-purecounter-duration="1"
                              class="purecounter"></span>
                        <p>Siswa aktif dalam penelitian</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="bi bi-journal-richtext"></i>
                        <span data-purecounter-start="0"
                              data-purecounter-end=2401 data-purecounter-duration="1"
                              class="purecounter"></span>
                        <p>Penelitian sedang dikerjakan</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-headset"></i>
                        <span data-purecounter-start="0"
                              data-purecounter-end=24 data-purecounter-duration="1"
                              class="purecounter"></span>
                        <p>Penelitian dipublikasi</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-people"></i>
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                              class="purecounter"></span>
                        <p>Hard Workers</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
        <div class="section-title">
            <h2>Partner kami</h2>
            <h3>Partner kami dalam penelitian</h3>
        </div>
        <div class="container" data-aos="zoom-in">
            <div class="row">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{asset('assets/img/partners/partner-1.png')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{asset('assets/img/partners/partner-2.png')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{asset('assets/img/partners/partner-3.png')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{asset('assets/img/partners/partner-4.png')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{asset('assets/img/partners/partner-5.png')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{asset('assets/img/partners/partner-6.png')}}" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="klub" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Klub</h2>
                <h3>Bergabunglah dengan klub yang<span> Menakjubkan!</span></h3>
                <p>Terdapat banyak pilihan klub yang dimana siswa dapat bergabung ke lebih dari satu klub</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="{{ asset('assets/img/klub/seminar/seminar_logo.png') }}" alt="icon"
                                               width="200px"></div>
                        <h4><a href="">Seminar</a></h4>
                        <p>Organisasi Eksekutif Siswa yang bertugas mengatur keseluruhan klub dan relasional murid
                            dengan Sekolah</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                     data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="{{ asset('assets/img/klub/veritas/veritas_logo.png') }}" alt="icon"
                                               width="180px"></div>
                        <h4><a href="">Veritas</a></h4>
                        <p>Wujudkan mimpimu menjadi ahli sistem komputerisasi disini!</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                     data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><img src="{{ asset('assets/img/klub/sptf/sptf_logo.png') }}" alt="icon"
                                               width="70px"></div>
                        <h4><a href="">Super Phenomenon Task Force</a></h4>
                        <p>Tempat khusus dimana kita selidiki semua celah keamanan dari sebuah sistem</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="{{ asset('assets/img/klub/C&C/C&C_logo.png') }}" alt="icon"
                                               width="100px"></div>
                        <h4><a href="">Cleaning & Clearing</a></h4>
                        <p>Mari bersihkan semuanya! Namun dengan cara yang elegan ya...</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="{{ asset('assets/img/klub/gamedev/gamedev_logo.png') }}" alt="icon"
                                               width="120px"></div>
                        <h4><a href="">Game Development</a></h4>
                        <p>Lelah bermain? mari buat permainan sendiri! </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><img src="{{ asset('assets/img/klub/engineering/engineering_logo.png') }}"
                                               alt="icon" width="100px"></div>
                        <h4><a href="">Engineering Club</a></h4>
                        <p>Apakah era penemuan teknologi telah berakhir? Hah.. Kami rasa tidak!</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="sambutan" class="testimonials">
        <div class="container" data-aos="zoom-in">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{asset('assets/img/klub/seminar/seminar_leader.png')}}" class="testimonial-img"
                                 alt="">
                            <h3>Rio</h3>
                            <h4>Ketua Klub Seminar</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Hay
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div> <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{asset('assets/img/klub/veritas/veritas_leader.png')}}" class="testimonial-img"
                                 alt="">
                            <h3>Kagami Chihiro</h3>
                            <h4>Ketua Klub Veritas</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Hay1
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div> <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{asset('assets/img/klub/sptf/sptf_leader.png')}}" class="testimonial-img" alt="">
                            <h3>Himari Akeboshi</h3>
                            <h4>Ketua Klub Super Phenomenon Task Force</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Mari bertempur
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div> <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{asset('assets/img/klub/C&C/C&C_leader.png')}}" class="testimonial-img" alt="">
                            <h3>Neru Mikamo</h3>
                            <h4>Ketua Klub Cleaning & Clearing</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Bersih bersih dulu ges
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div> <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{asset('assets/img/klub/gamedev/gamedev_leader.png')}}" class="testimonial-img"
                                 alt="">
                            <h3>Yuzu Hanoka</h3>
                            <h4>Ketua Klub Game Development</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Mobel Lejen
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div> <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{asset('assets/img/klub/engineering/engineering_leader.png')}}"
                                 class="testimonial-img" alt="">
                            <h3>Shiraishi Utaha</h3>
                            <h4>Ketua Klub Engineering</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Tukang listrik
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div> <!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Testimonials Section -->


    <!-- ======= Portfolio Section ======= -->

    <section id="galeri" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Galeri</h2>
                <h3>Galeri <span>Klub</span></h3>
                <p>Berikut adalah momen - momen gambar dari setiap Klub.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-seminar">Seminar</li>
                        <li data-filter=".filter-veritas">Veritas</li>
                        <li data-filter=".filter-sptf">SPTF</li>
                        <li data-filter=".filter-cnc">C&C</li>
                        <li data-filter=".filter-gamedev">Game Dev</li>
                        <li data-filter=".filter-engineering">Engineer</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                {{--No.1--}}
                <div class="col-lg-4 col-md-6 portfolio-item filter-veritas">
                    <img src="{{asset('assets/img/klub/veritas/veritas_2.png')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Veritas</h4>
                        <p>Suasana malam Veritas</p>
                    </div>
                </div>
                {{--No.2--}}
                <div class="col-lg-4 col-md-6 portfolio-item filter-sptf">
                    <img src="{{asset('assets/img/klub/sptf/sptf_1.png')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Super Phenomenon Task Force</h4>
                        <p>Suasana Laboratorium</p>
                    </div>
                </div>
                {{--No.3--}}
                <div class="col-lg-4 col-md-6 portfolio-item filter-gamedev">
                    <img src="{{asset('assets/img/klub/gamedev/gamedev_1.png')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Game Developmen</h4>
                        <p>Ruang Game Development</p>
                    </div>
                </div>
                {{--No.4--}}
                <div class="col-lg-4 col-md-6 portfolio-item filter-cnc">
                    <img src="{{asset('assets/img/klub/C&C/C&C_1.png')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Clearing & Cleaning</h4>
                        <p>Pembersihan Malam</p>
                    </div>
                </div>
                {{--No.5--}}
                <div class="col-lg-4 col-md-6 portfolio-item filter-seminar">
                    <img src="{{asset('assets/img/klub/seminar/seminar_1.png')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Seminar</h4>
                        <p>Hangout Klub Seminar</p>
                    </div>
                </div>
                {{--No.6--}}
                <div class="col-lg-4 col-md-6 portfolio-item filter-veritas">
                    <img src="{{asset('assets/img/klub/veritas/veritas_1.png')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Veritas</h4>
                        <p>Suasana siang Veritas</p>
                    </div>
                </div>
                {{--No.7--}}
                <div class="col-lg-4 col-md-6 portfolio-item filter-seminar">
                    <img src="{{asset('assets/img/klub/seminar/seminar_2.jpg')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Seminar</h4>
                        <p>Web</p>
                    </div>
                </div>
                {{--No.8--}}
                <div class="col-lg-4 col-md-6 portfolio-item filter-engineering">
                    <img src="{{asset('assets/img/klub/engineering/engineering_1.png')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Engineering</h4>
                        <p>Hangar Klub Engineering</p>
                    </div>
                </div>
                {{--No.9--}}
                <div class="col-lg-4 col-md-6 portfolio-item filter-gamedev">
                    <img src="{{asset('assets/img/klub/gamedev/gamedev_2.png')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Game Development</h4>
                        <p>Hangout anggota Klub</p>
                    </div>
                </div>
                {{--No.10--}}
                <div class="col-lg-4 col-md-6 portfolio-item filter-cnc">
                    <img src="{{asset('assets/img/klub/C&C/C&C_2.png')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Cleaning & Clearing</h4>
                        <p>Web</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Contact Section ======= -->
    <section id="kontak" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Hubungi Kami</h2>
                <h3><span>Kontak Millennium School</span></h3>
                <p>Hubungi kami untuk mendapatkan bantuan informasi.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bi-geo-alt-fill"></i>
                        <h3>Alamat</h3>
                        <p>Kivotos City Education Center, 97</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bi-envelope"></i>
                        <h3>Email</h3>
                        <p>kontak@millennium-school.sch.kv</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bi-telephone"></i>
                        <h3>Telepon</h3>
                        <p>+62 8832 5362 6263</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Millennium School<span>.</span></h3>
                    <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span>SatriaGroup</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">Satria</a>
        </div>
    </div>
</footer> <!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!--Vendor JS File-->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<!--Main JS File-->
<script src="{{asset('assets/js/main.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#login').click(function (event) {
            event.preventDefault();
        });
    });
    $(document).ready(function () {
        $('#logo').click(function (event) {
            event.preventDefault();
        });
    });
</script>

</body>

</html>
