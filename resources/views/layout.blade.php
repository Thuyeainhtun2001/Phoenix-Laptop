<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('favicon')
    {{-- for jQuery ajax --}}
    @yield('csrf')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--  Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('user/css/main.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Start Header -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="{{ route('phoenix.home') }}" class="logo d-flex align-items-center me-auto me-lg-0">
                <img class="fs-4" src="{{ asset('images/logo.png') }}" class="me-3" alt="">
                <h1><span>PHOENIX</span></h1>
            </a>
            <!-- .navbar -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/#home">HOME</a></li>
                    <li><a href="/#products">PRODUCTS</a></li>
                    <li><a href="/#about">ABOUT</a></li>
                    <li><a href="/#events">EVENTS</a></li>
                    <li><a href="/#gallery">GALLERY</a></li>
                    <li><a href="/#contact">CONTACT</a></li>
                    <li class="dropdown"><a href="#"><span>ACCOUNT</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @if (!Auth::user())
                                <li><a href="{{ route('login') }}">LOGIN<i
                                            class="fa-solid fa-right-to-bracket fs-5"></i></a></li>
                                <li><a href="{{ route('register') }}">REGISTER<i
                                            class="fa-solid fa-registered fs-5"></i></a></li>
                            @else
                                <li><a href="{{ route('profile') }}">PROFILE SETTING<i
                                            class="fa-solid fa-gear fs-5"></i></a></li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <input class="btn btn-danger" type="submit" value="LOGOUT">
                                            <i class="fa-solid fa-right-from-bracket fs-5"></i>
                                        </a>
                                    </li>
                                </form>
                            @endif
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- .navbar -->
            @if (Auth::user())
                @if (Auth::user()->role == 'user')
                    @yield('cartBadge')
                @else
                    <a class="btn-book-a-table" href="{{ route('admin.content') }}">ADMIN<i
                            class="fa-solid fa-user-gear fs-5 ms-2"></i></a>
                @endif
            @endif
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
    <!-- End Header -->
    @yield('content');
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                            Thit Sar Street <br>
                            Yangon, Myanmar Country<br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>HOT LINE</h4>
                        <p>
                            <strong>Phone:</strong> 09-762584073<br>
                            <strong>Email:</strong> phoenixadmin@gmail.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat: 9AM</strong> - 8PM<br>
                            Sunday: Closed
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.facebook.com/thuyeain.htun.75" class="facebook"><i
                                class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>KFC</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by KFC
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->
    <!-- Scroll Up Arrow -->
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
</body>
<!-- Vendor JS Files -->
<script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('user/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('user/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('user/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('user/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('user/vendor/php-email-form/validate.js') }}"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="{{ asset('user/js/main.js') }}"></script>
{{-- for jQuery --}}
@yield('jQuery')
</html>
