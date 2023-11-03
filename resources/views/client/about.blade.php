<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>About Us</h2>
            <p style="font-family: poppins; font-weight:300; font-size:2rem">Learn More <span>About Us</span></p>
        </div>
@foreach ($abouts as $item)
        <div class="row gy-4">
            <div class="col-lg-7 position-relative about-img" style="background-image: url(menu1/assets/img/about.jpg) ;"
                data-aos="fade-up" data-aos-delay="150">
                <div class="call-us position-absolute">
                    <h4>{{$item->title}}</h4>
                    <p>Come and Eat with Us!</p>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                <div class="content ps-0 ps-lg-5">
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </li>
                        <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
                        </li>
                        <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                            fugiat nulla pariatur.</li>
                    </ul>
                    <p>
                        {{$item->description}}
                    </p>

                    <div class="position-relative mt-4">
                        <img src="{{ asset('foodimage/' . $item->image2) }}" class="img-fluid" alt="">
                        {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> --}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>
<!-- ======= Why Us Section ======= -->

<section id="why-us" class="why-us section-bg">
    <div class="container" data-aos="fade-up">

        <div class="row gy-4">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="why-box">
                    <h3>Why to choose Hamro Canteen?</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                        Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad
                        corporis.
                    </p>
                    <div class="text-center">
                        <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                    </div>
                </div>
            </div><!-- End Why Box -->

            <div class="col-lg-8 d-flex align-items-center">
                <div class="row gy-4">

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-clipboard-data"></i>
                            <h4>Corporis voluptates officia eiusmod</h4>
                            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-gem"></i>
                            <h4>Ullamco laboris ladore pan</h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-inboxes"></i>
                            <h4>Labore consequatur incidid dolore</h4>
                            <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                        </div>
                    </div><!-- End Icon Box -->

                </div>
            </div>

        </div>

    </div>
</section>
<!-- End Why Us Section -->
