<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="public/Image/LogoDark.png" rel="icon">
    <link href="public/Image/LogoDark.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="menu1/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="menu1/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="menu1/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="menu1/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="menu1/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="menu1/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Yummy
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


    <!-- ======= Header ======= -->
    @include('client.header')
    <!-- End Header -->




    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg "
        style="padding-top:100px; padding-bottom:20px">
        <div class="container">
            @foreach ($homes as $item)
                <div class="row justify-content-between gy-5">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start"
                        style="font-family: poppins">
                        <h2 data-aos="fade-up" style="font-family: poppins; color:#ce1212;">{{ $item->title }}</h2>
                        <p data-aos="fade-up" data-aos-delay="100" style="font-family: poppins; font-weight:500;">
                            {{ $item->description }}</p>
                        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                        {{-- <img src="{{ asset('foodimage/' . $item->image) }}" class="img-fluid" alt=""
                            data-aos="zoom-out" data-aos-delay="300"> --}}
                            
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($food->take(1) as $fd)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('foodimage/' . $fd->image) }}" class="d-block w-100"
                                            alt="{{ $fd->title }}">
                                        <h3 class="text-center">{{ $fd->title }}</h3>
                                        <h4 class="text-center " style="color:#ce1212; font-weight:800;">Rs.
                                            {{ $fd->price }}
                                        </h4>
                                    </div>
                                @endforeach
                                @foreach ($food->skip(1) as $fd)
                                    <div class="carousel-item">
                                        <img src="{{ asset('foodimage/' . $fd->image) }}" class="d-block w-100"
                                            alt="{{ $fd->title }}">
                                        <h3 class="text-center">{{ $fd->title }}</h3>
                                        <h4 class="text-center" style="color:#ce1212; font-weight:800; ">Rs.
                                            {{ $fd->price }}</h4>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        @include('client.about')
        <!-- End About Section -->
        <!-- ======= Menu Section ======= -->
        @include('client.food')
        <!-- End Menu Section -->

        <!-- ======= Gallery Section ======= -->
        @include('client.gallery')<!-- End Gallery Section -->

        <!-- ======= Contact Section ======= -->
        @include('client.contact')<!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('client.footer')
    <!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="menu1/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="menu1/assets/vendor/aos/aos.js"></script>
    <script src="menu1/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="menu1/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="menu1/assets/vendor/swiper/swiper-bundle.min.js"></script>
    {{-- <script src="menu1/assets/vendor/php-email-form/validate.js"></script> --}}

    <!-- Template Main JS File -->
    <script src="menu1/assets/js/main.js"></script>

</body>

</html>
