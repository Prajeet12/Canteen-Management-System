<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>About Us</h2>
            <p style="font-family: poppins; font-weight:300; font-size:2rem">Learn More <span>About Us</span></p>
        </div>
@foreach ($abouts as $item)
        <div class="row gy-4">
            <div class="col-lg-7 position-relative about-img" style="background-image: url('{{ asset('foodimage/' . $item->image1) }}');"
                data-aos="fade-up" data-aos-delay="150">
                <div class="call-us position-absolute">
                    <h4>{{$item->title}}</h4>
                    <p>Come and Eat with Us!</p>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                <div class="content ps-0 ps-lg-5">
                    <p style="text-align: justify;">
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


<!-- End Why Us Section -->
