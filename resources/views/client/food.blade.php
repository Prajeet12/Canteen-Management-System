<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Our Menu</h2>
            <p style="font-family: poppins; font-weight:300; font-size:2rem">Check Our <span>Yummy Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

            @foreach ($data->take(1) as $item)
                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu{{ $item->id }}">
                        <h4>{{ $item->category_name }}</h4>
                    </a>
                </li><!-- End tab nav item -->
            @endforeach

            @foreach ($data->skip(1) as $item)
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu{{ $item->id }}">
                        <h4>{{ $item->category_name }}</h4>
                    </a>
                </li><!-- End tab nav item -->
            @endforeach

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

            @foreach ($data->take(1) as $item)
                <div class="tab-pane fade active show" id="menu{{ $item->id }}">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>{{$item->category_name}}</h3>
                    </div>

                    <div class="row gy-5">

                        @foreach ($item->food as $food)
                            <div class="col-lg-4 menu-item">
                                <a href="{{ url('view-category' . $food->category_name) }}"></a>
                                <a href="{{ asset('foodimage/' . $food->image) }}" class="glightbox"><img
                                        src="{{ asset('foodimage/' . $food->image) }}" class="menu-img img-fluid"
                                        alt=""></a>
                                <h4>{{ $food->title }}</h4>
                                <p class="ingredients">
                                    {{ $food->description }}
                                </p>
                                <p class="price">
                                    Rs. {{ $food->price }}
                                </p>
                            </div><!-- Menu food -->
                        @endforeach


                    </div>
                </div><!-- End Starter Menu Content -->
            @endforeach

            @foreach ($data->skip(1) as $item)
                <div class="tab-pane fade" id="menu{{ $item->id }}">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>{{$item->category_name}}</h3>
                    </div>

                    <div class="row gy-5">

                        @foreach ($item->food as $food)
                            <div class="col-lg-4 menu-item">
                                <a href="{{ url('view-category' . $food->category_name) }}"></a>
                                <a href="{{ asset('foodimage/' . $food->image) }}" class="glightbox"><img
                                        src="{{ asset('foodimage/' . $food->image) }}" class="menu-img img-fluid"
                                        alt=""></a>
                                <h4>{{ $food->title }}</h4>
                                <p class="ingredients">
                                    {{ $food->description }}
                                </p>
                                <p class="price">
                                    Rs. {{ $food->price }}
                                </p>
                            </div><!-- Menu food -->
                        @endforeach

                    </div>


                </div><!-- End Breakfast Menu Content -->
            @endforeach

        </div>

    </div>
</section>
