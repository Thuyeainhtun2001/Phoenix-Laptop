@extends('layout')
@section('title', 'PHOENIX');
@section('cartBadge')
    <a href="{{ route('cart.list') }}">
        <button type="button" class="btn position-relative btn-book-a-table">
            Cart <i class="fa-solid fa-cart-shopping fs-5 ms-2"></i>
            @if (count($cartData) != 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                    {{ count($cartData) }}
                </span>
            @endif
        </button>
    </a>
@endsection
@section('content')
    {{-- for success message --}}
    <div class="text-center" style="margin-top: 70px">
        @if (session('success'))
            <div class="alert alert-warning text-center d-flex justify-content-center align-items-center" role="alert">
                <i class="fa-solid fa-circle-check me-2 fs-2"></i>{{ session('success') }}
            </div>
        @endif
    </div>
    <!-- ======= Hero Section ======= -->
    <section id="home" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <!-- ======= Hero Text ======= -->
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up"><strong>Warmly Welcome From PHOENIX</strong></h2>
                    <p data-aos="fade-up" data-aos-delay="100">Have a grate day for you</p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="/#products" class="btn-book-a-table">Order Here</a>
                        <a href="https://www.youtube.com/watch?v=9_FQW36r0n8&t=9s"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch some products</span></a>
                    </div>
                </div>
                <!-- ======= Hero Carousel Images ======= -->
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="1000">
                                <img src="{{ asset('user/images/laptops/image1.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="1000">
                                <img src="{{ asset('user/images/laptops/image2.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="1000">
                                <img src="{{ asset('user/images/laptops/image3.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="1000">
                                <img src="{{ asset('user/images/laptops/image4.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="1000">
                                <img src="{{ asset('user/images/laptops/image5.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="1000">
                                <img src="{{ asset('user/images/laptops/image6.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="1000">
                                <img src="{{ asset('user/images/laptops/image7.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
    </section>
    <!-- End Hero Section -->
    <!-- ======= Products Section ======= -->
    <section id="products" class="menu">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Products</h2>
                <p>Check Our <span>Laptop List</span></p>
            </div>
            {{-- product header --}}
            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#acer">
                        <h4>Acer</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#asus">
                        <h4>Asus</h4>
                    </a><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#dell">
                        <h4>Dell</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#lenovo">
                        <h4>Lenovo</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#msi">
                        <h4>MSI</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ms">
                        <h4>MS Surface</h4>
                    </a>
                </li><!-- End tab nav item -->
            </ul>
            {{-- products --}}
            {{-- acer --}}
            <div>
                <div class=" tab-content" data-aos=" fade-up" data-aos-delay="300">
                    <div class="tab-pane fade active show" id="acer">
                        {{-- title --}}
                        <div class="tab-header text-center">
                            <p>Brand</p>
                            <h4 class="text-danger">ACER</h4>
                        </div>
                        {{-- list --}}
                        <div class="row d-flex justify-content-evenly">
                            @foreach ($productData as $product)
                                @if ($product->category_id == 1)
                                    <div class="card gy-4 gx-3" style="width: 19rem;margin:45px">
                                        <a href="{{ route('shop', $product->id) }}">
                                            <img src="{{ asset('storage/products/' . $product->image) }}"
                                                class="card-img-top" alt="product laptop">
                                        </a>
                                        <div class="card-body">
                                            <h5><i
                                                    class="fa-solid fa-laptop fs-5 me-2 text-primary"></i><strong>{{ $product->name }}</strong>
                                            </h5>
                                            <p><i
                                                    class="fa-solid fa-computer fs-5 me-2 text-primary"></i>{{ $product->brand }}
                                            </p>
                                            <p><i
                                                    class="fa-solid fa-dollar-sign fs-5 me-2 text-danger"></i>{{ $product->price }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- asus --}}
            <div>
                <div class=" tab-content" data-aos=" fade-up" data-aos-delay="300">
                    <div class="tab-pane fade show" id="asus">
                        {{-- title --}}
                        <div class="tab-header text-center">
                            <p>Brand</p>
                            <h4 class="text-danger">ASUS</h4>
                        </div>
                        {{-- list --}}
                        <div class="row d-flex justify-content-evenly">
                            @foreach ($productData as $product)
                                @if ($product->category_id == 2)
                                    <div class="card gy-4 gx-3" style="width: 19rem;margin:45px">
                                        <a href="{{ route('shop', $product->id) }}">
                                            <img src="{{ asset('storage/products/' . $product->image) }}"
                                                class="card-img-top" alt="product laptop">
                                        </a>
                                        <div class="card-body">
                                            <h5><i
                                                    class="fa-solid fa-laptop fs-5 me-2 text-primary"></i><strong>{{ $product->name }}</strong>
                                            </h5>
                                            <p><i
                                                    class="fa-solid fa-computer fs-5 me-2 text-primary"></i>{{ $product->brand }}
                                            </p>
                                            <p><i
                                                    class="fa-solid fa-dollar-sign fs-5 me-2 text-danger"></i>{{ $product->price }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- dell --}}
            <div>
                <div class=" tab-content" data-aos=" fade-up" data-aos-delay="300">
                    <div class="tab-pane fade show" id="dell">
                        {{-- title --}}
                        <div class="tab-header text-center">
                            <p>Brand</p>
                            <h4 class="text-danger">DELL</h4>
                        </div>
                        {{-- list --}}
                        <div class="row d-flex justify-content-evenly">
                            @foreach ($productData as $product)
                                @if ($product->category_id == 3)
                                    <div class="card gy-4 gx-3" style="width: 19rem;margin:45px">
                                        <a href="{{ route('shop', $product->id) }}">
                                            <img src="{{ asset('storage/products/' . $product->image) }}"
                                                class="card-img-top" alt="product laptop">
                                        </a>
                                        <div class="card-body">
                                            <h5><i
                                                    class="fa-solid fa-laptop fs-5 me-2 text-primary"></i><strong>{{ $product->name }}</strong>
                                            </h5>
                                            <p><i
                                                    class="fa-solid fa-computer fs-5 me-2 text-primary"></i>{{ $product->brand }}
                                            </p>
                                            <p><i
                                                    class="fa-solid fa-dollar-sign fs-5 me-2 text-danger"></i>{{ $product->price }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- lenove --}}
            <div>
                <div class=" tab-content" data-aos=" fade-up" data-aos-delay="300">
                    <div class="tab-pane fade show" id="lenovo">
                        {{-- title --}}
                        <div class="tab-header text-center">
                            <p>Brand</p>
                            <h4 class="text-danger">LENOVO</h4>
                        </div>
                        {{-- list --}}
                        <div class="row d-flex justify-content-evenly">
                            @foreach ($productData as $product)
                                @if ($product->category_id == 4)
                                    <div class="card gy-4 gx-3" style="width: 19rem;margin:45px">
                                        <a href="{{ route('shop', $product->id) }}">
                                            <img src="{{ asset('storage/products/' . $product->image) }}"
                                                class="card-img-top" alt="product laptop">
                                        </a>
                                        <div class="card-body">
                                            <h5><i
                                                    class="fa-solid fa-laptop fs-5 me-2 text-primary"></i><strong>{{ $product->name }}</strong>
                                            </h5>
                                            <p><i
                                                    class="fa-solid fa-computer fs-5 me-2 text-primary"></i>{{ $product->brand }}
                                            </p>
                                            <p><i
                                                    class="fa-solid fa-dollar-sign fs-5 me-2 text-danger"></i>{{ $product->price }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- msi --}}
            <div>
                <div class=" tab-content" data-aos=" fade-up" data-aos-delay="300">
                    <div class="tab-pane fade show" id="msi">
                        {{-- title --}}
                        <div class="tab-header text-center">
                            <p>Brand</p>
                            <h4 class="text-danger">MSI</h4>
                        </div>
                        {{-- list --}}
                        <div class="row d-flex justify-content-evenly">
                            @foreach ($productData as $product)
                                @if ($product->category_id == 5)
                                    <div class="card gy-4 gx-3" style="width: 19rem;margin:45px">
                                        <a href="{{ route('shop', $product->id) }}">
                                            <img src="{{ asset('storage/products/' . $product->image) }}"
                                                class="card-img-top" alt="product laptop">
                                        </a>
                                        <div class="card-body">
                                            <h5><i
                                                    class="fa-solid fa-laptop fs-5 me-2 text-primary"></i><strong>{{ $product->name }}</strong>
                                            </h5>
                                            <p><i
                                                    class="fa-solid fa-computer fs-5 me-2 text-primary"></i>{{ $product->brand }}
                                            </p>
                                            <p><i
                                                    class="fa-solid fa-dollar-sign fs-5 me-2 text-danger"></i>{{ $product->price }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- microsoft --}}
            <div>
                <div class=" tab-content" data-aos=" fade-up" data-aos-delay="300">
                    <div class="tab-pane fade show" id="ms">
                        {{-- title --}}
                        <div class="tab-header text-center">
                            <p>Brand</p>
                            <h4 class="text-danger">MS SERFACE</h4>
                        </div>
                        {{-- list --}}
                        <div class="row d-flex justify-content-evenly">
                            @foreach ($productData as $product)
                                @if ($product->category_id == 6)
                                    <div class="card gy-4 gx-3" style="width: 19rem;margin:45px">
                                        <a href="{{ route('shop', $product->id) }}">
                                            <img src="{{ asset('storage/products/' . $product->image) }}"
                                                class="card-img-top" alt="product laptop">
                                        </a>
                                        <div class="card-body">
                                            <h5><i
                                                    class="fa-solid fa-laptop fs-5 me-2 text-primary"></i><strong>{{ $product->name }}</strong>
                                            </h5>
                                            <p><i
                                                    class="fa-solid fa-computer fs-5 me-2 text-primary"></i>{{ $product->brand }}
                                            </p>
                                            <p><i
                                                    class="fa-solid fa-dollar-sign fs-5 me-2 text-danger"></i>{{ $product->price }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Section -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>About Us</h2>
                <p>Learn More <span>About Company</span></p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-7 position-relative about-img"
                    style="background-image: url('{{ asset('images/company.jpg') }}') ;" data-aos="fade-up"
                    data-aos-delay="150">
                </div>
                <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            A laptop has an all-in-one design, with a built-in monitor, keyboard, touchpad (which replaces
                            the mouse), and speakers. This means it is fully functional, even when no peripherals are
                            connected. A laptop is also quicker to set up, and there are fewer cables to get in the way.
                            You'll also have to the option to connect a regular mouse, larger monitor, and other
                            peripherals. This basically turns your laptop into a desktop computer, with one main difference:
                            You can easily disconnect the peripherals and take the laptop with you wherever you go.
                        </p>
                        <div class="position-relative mt-4">
                            <img src="{{ asset('images/alienware.jpg') }}" class="img-fluid" alt="">
                            <a href="https://www.youtube.com/watch?v=bla-Z50J-mk" class="glightbox play-btn"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="why-box">
                        <h3>Why Choose PHOENIX?</h3>
                        <p>
                            Because Phoenix has a strong global presence.
                            It has very strong customer services and quick delivery system.
                            Laptop prices are resonable and it has always promotion and give presents.
                            Great warranty and reparing services are maing point for every customers.
                            You can order different variety of laptops and their spare parts.
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
                                <h4>Strong Financial Performance</h4>
                                <p>Phoenix Corporate have strong financial performance. Globally,the financial
                                    performance
                                    of phoenix has been strong.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-gem"></i>
                                <h4>Our Promise</h4>
                                <p>The Phoenix team lives by our people promise: Be your best self. Make a difference. Have
                                    fun. We have experts service technician and they are waiting for your problems.
                                </p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-inboxes"></i>
                                <h4>R-Dragon's Mission</h4>
                                <p>Our principles of cooperation, respect, responsibility, transparency,
                                    and innovation, our's main focus is the success of its business
                                    partners, employees, and consumers.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end why us section --}}
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg" style="height: 500px">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Testimonials</h2>
                <p>What Are They <span>Saying About Us</span></p>
            </div>

            <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                            suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                            Maecen aliquam, risus at semper.
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>Thuyeain Htun</h3>
                                        <h4>Ceo &amp; Founder</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="{{ asset('images/thuyeain.jpg') }}" class="img-fluid testimonial-img"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            Export tempor illum tamen malis malis eram quae irure esse labore quem
                                            cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua
                                            noster fugiat irure amet legam anim culpa.
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>Myo Min Htike</h3>
                                        <h4>Designer</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="{{ asset('images/mmh.jpg') }}" class="img-fluid testimonial-img"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                            quem veniam duis minim tempor labore quem eram duis noster aute amet eram
                                            fore quis sint minim.
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>Sithu Aung</h3>
                                        <h4>Store Owner</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="{{ asset('images/st.jpg') }}" class="img-fluid testimonial-img"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam esse veniam culpa fore nisi cillum quid.
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>Nay Linn Naing</h3>
                                        <h4>Entrepreneur</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="{{ asset('images/nln1.jpg') }}" class="img-fluid testimonial-img"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
    <!-- End Testimonials Section -->
    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
        <div class="container-fluid" data-aos="fade-up">

            <div class="section-header">
                <h2>Events</h2>
                <p>Share <span>Your Moments</span> In Our Promotion</p>
            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                        style="background-image: url('{{ asset('images/event1.png') }}')">
                        <p class="description">
                            Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere.
                            Enim facilis veritatis id est rem repudiandae nulla expedita quas.
                        </p>
                    </div><!-- End Event item -->

                    <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                        style="background-image: url('{{ asset('images/event2.png') }}')">
                        <p class="description">
                            In delectus sint qui et enim. Et ab repudiandae inventore quaerat doloribus. Facere nemo
                            vero est ut dolores ea assumenda et. Delectus saepe accusamus aspernatur.
                        </p>
                    </div><!-- End Event item -->

                    <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                        style="background-image: url('{{ asset('images/event3.png') }}')">
                        <p class="description">
                            Laborum aperiam atque omnis minus omnis est qui assumenda quos. Quis id sit quibusdam. Esse
                            quisquam ducimus officia ipsum ut quibusdam maxime. Non enim perspiciatis.
                        </p>
                    </div><!-- End Event item -->

                    <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                        style="background-image: url('{{ asset('images/event4.png') }}')">
                        <p class="description">
                            Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere.
                            Enim facilis veritatis id est rem repudiandae nulla expedita quas.
                        </p>
                    </div><!-- End Event item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
    <!-- End Events Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>gallery</h2>
                <p>Check <span>Our Gallery</span></p>
            </div>

            <div class="gallery-slider swiper" style="height: 500px">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide" style="height: 150px"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('user/images/laptops/image1.png') }}"><img
                                src="{{ asset('user/images/laptops/image1.png') }}" class="img-fluid"
                                alt=""></a>
                    </div>
                    <div class="swiper-slide" style="height: 150px"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('user/images/laptops/image2.png') }}"><img
                                src="{{ asset('user/images/laptops/image2.png') }}" class="img-fluid"
                                alt=""></a>
                    </div>
                    <div class="swiper-slide" style="height: 150px"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('user/images/laptops/image3.png') }}"><img
                                src="{{ asset('user/images/laptops/image3.png') }}"class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide" style="height: 150px"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('user/images/laptops/image4.png') }}"><img
                                src="{{ asset('user/images/laptops/image4.png') }}" class="img-fluid"
                                alt=""></a>
                    </div>
                    <div class="swiper-slide" style="height: 150px"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('user/images/laptops/image5.png') }}"><img
                                src="{{ asset('user/images/laptops/image5.png') }}"class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide" style="height: 150px"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('user/images/laptops/image6.png') }}"><img
                                src="{{ asset('user/images/laptops/image6.png') }}" class="img-fluid"
                                alt=""></a>
                    </div>
                    <div class="swiper-slide" style="height: 150px"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('user/images/laptops/image7.png') }}"><img
                                src="{{ asset('user/images/laptops/image7.png') }}" class="img-fluid"
                                alt=""></a>
                    </div>
                    <div class="swiper-slide" style="height: 150px"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ asset('user/images/laptops/image8.png') }}"><img
                                src="{{ asset('user/images/laptops/image8.png') }}" class="img-fluid"
                                alt=""></a>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
    <!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Contact</h2>
                <p>Need Help? <span>Contact Us</span></p>
            </div>

            <div class="row gy-4">

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-map flex-shrink-0"></i>
                        <div>
                            <h3>Our Address</h3>
                            <p>Thit Sar Street/ Yangon/ Myanmar</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center">
                        <i class="icon bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p>phoenixadmin@gmail.com</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>09-762584073</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-share flex-shrink-0"></i>
                        <div>
                            <h3>Opening Hours</h3>
                            <div><strong>Mon-Sat:</strong> 9AM - 8PM;
                                <strong>Sunday:</strong> Closed
                            </div>
                        </div>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <!--Start Contact Form -->
            <div id="contact" class="form-control mt-4">
                <form action="{{ route('contact') }}" method="post" role="form" class=" p-3 p-md-4">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-xl-6">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="your name">
                            @error('name')
                                <h5 class="text-danger text-center">{{ $message }}</h5>
                            @enderror
                        </div>
                        <div class="col-xl-6">
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" placeholder="your email">
                            @error('email')
                                <h5 class="text-danger text-center">{{ $message }}</h5>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <input type="text" class="form-control" name="phone" id="subject"
                            placeholder="your phone number">
                    </div>
                    <div class="mt-4">
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5"
                            placeholder="your message"></textarea>
                        @error('message')
                            <h5 class="text-danger text-center">{{ $message }}</h5>
                        @enderror
                    </div>
                    <div class="text-center mt-4"><button class="btn btn-danger text white" type="submit">Send
                            Message</button></div>
                </form>
            </div>
            <!--End Contact Form -->
        </div>
    </section>
    <!-- End Contact Section -->
    <!-- Start Google Maps -->
    <div class="mb-3">
        {{-- <iframe style="border:0; width: 100%; height: 350px;"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
            frameborder="0" allowfullscreen></iframe> --}}
        <iframe style="border:0; width: 100%; height: 350px;"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3730.8844482431628!2d97.04677293631902!3d20.755477082375435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ce887e2abc0b37%3A0x39a85ead6d860b96!2sUniversity%20Of%20Taunggyi!5e0!3m2!1sen!2smm!4v1705743689994!5m2!1sen!2smm"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- End Google Maps -->
@endsection
