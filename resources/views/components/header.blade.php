<header class="header-area">
    <!-- Start mobile menu -->
    <div class="mobile-menu">
        <div class="container">
            <div class="mobile-menu-wrapper"></div>
        </div>
    </div>
    <!-- End mobile menu -->

    <div class="main-responsive-nav">
        <div class="container">
            <!-- Mobile Logo -->
            <div class="logo">
                <a href="{{ route('home') }}" target="_self" title="Oppida">
                    <img class="lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/logo/logo-1.png') }}" alt="Brand Logo">
                </a>
            </div>
            <!-- Menu toggle button -->
            <button class="menu-toggler" type="button">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <div class="main-navbar">
        <div class="header-top bg-white py-3 mobile-item border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between gap-15 align-items-center">
                    <a href="mailTo:examle@email.com" class="icon-start" target="_self" title="example@email.com">
                        <i class="fal fa-envelope"></i>
                        example@email.com
                    </a>
                    <div class="social-link style-2 size-md">
                        <a class="rounded-pill" href="https://www.instagram.com/" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a>
                        <a class="rounded-pill" href="https://www.dribbble.com/" target="_blank" title="dribbble"><i class="fab fa-dribbble"></i></a>
                        <a class="rounded-pill" href="https://www.twitter.com/" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a>
                        <a class="rounded-pill" href="https://www.youtube.com/" target="_blank" title="youtube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <!-- Logo -->
                    <a class="navbar-brand" href="{{ route('home') }}" target="_self" title="Oppida">
                        <img class="lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/logo/logo-1.png') }}" alt="Brand Logo">
                    </a>
                    <!-- Navigation items -->
                    <div class="collapse navbar-collapse">
                        <ul id="mainMenu" class="navbar-nav mobile-item mx-auto">
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link toggle">Courses <i class="fal fa-plus"></i></a>
                                <ul class="menu-dropdown">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('courses') }}">All Courses</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mentors') }}" class="nav-link toggle">Mentors <i class="fal fa-plus"></i></a>
                                <ul class="menu-dropdown">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('mentors') }}">All Mentors</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contactUs') }}">Contact</a>
                            </li>
                            @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Signout</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Signin</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="more-option mobile-item">
                        <div class="item">
                            @if (Auth::check())
                            <a href="{{ route('admin.dashboard') }}" class="btn-icon-text" target="_self" aria-label="User" title="User">
                                <i class="fal fa-user"></i>
                                <span>My Account</span>
                            </a>
                            @else
                            <a href="{{ route('signup') }}" class="btn-icon-text" target="_self" aria-label="User" title="User">
                                <i class="fal fa-user"></i>
                                <span>Sign Up</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
