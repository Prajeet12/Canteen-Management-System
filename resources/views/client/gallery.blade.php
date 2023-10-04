<section id="gallery" class="gallery section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>gallery</h2>
            <p style="font-family: poppins; font-weight:300; font-size:2rem">Check <span>Our Gallery</span></p>
        </div>

        <div class="gallery-slider swiper">

            <div class="swiper-wrapper align-items-center">
                @foreach ($galleries as $item)
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('foodimage/' . $item->image) }}"><img
                                src="{{ asset('foodimage/' . $item->image) }}" class="img-fluid" alt=""></a>
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>
