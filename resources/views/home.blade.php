@extends('layouts.app')

@section('content')
    <!-- Home-area start-->
    <section class="hero-banner hero-banner_v1 header-next pb-60">
        <div class="container">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-6">
                    <div class="banner-content mb-40">
                        <h1 class="title mb-30" data-aos="fade-up" data-aos-delay="100">
                            Upgrade Your Skills With <span>Oppida</span>
                            <img class="title-shape lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/title-shape.png') }}" alt="Shape">
                        </h1>
                        <p class="text" data-aos="fade-up" data-aos-delay="100">
                            Welcome to Oppida, your online destination for high-quality
                            education and professional development.
                        </p>
                        <div class="banner-filter-form mt-40" data-aos="fade-up" data-aos-delay="150">
                            <div class="form-wrapper border rounded-pill">
                                <form action="{{ route('courses') }}" method="GET">
                                    <div class="row align-items-center">
                                        <!-- Search Input -->
                                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <label for="search"><i class="fas fa-search"></i></label>
                                                <input type="text" id="search" name="search" class="form-control" placeholder="Search course">
                                                <div class="vr"></div>
                                            </div>
                                        </div>
                                        <!-- Category Select -->
                                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <label for="search"><i class="fas fa-th-large"></i></label>
                                                <select name="category" id="category" class="niceselect">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Submit Button -->
                                        <div class="col-xl-4 col-lg-2 col-md-4 col-sm-6">
                                            <button class="btn btn-lg btn-primary rounded-pill w-100" type="submit" aria-label="Find Course">
                                                <span>Find Course</span>
                                                <i class="fal fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="banner-image mb-40">
                        <img class="lazyload blur-up" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/banner/hero-banner-1.png') }}" alt="Banner Image">
                    </div>
                </div>
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-1.png') }}" alt="Shape">
            <img class="shape-2 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-2.png') }}" alt="Shape">
            <img class="shape-3 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-3.png') }}" alt="Shape">
            <img class="shape-4 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-4.png') }}" alt="Shape">
            <img class="shape-5 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-5.png') }}" alt="Shape">
            <img class="shape-6 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-6.png') }}" alt="Shape">
            <img class="shape-7 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-7.png') }}" alt="Shape">
            <img class="shape-8 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-8.png') }}" alt="Shape">
            <img class="shape-9 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-6.png') }}" alt="Shape">
        </div>
    </section>
    <!-- Home-area end -->

    <!-- Category-area start -->
    <section class="category-area category-area_v1 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title mb-0">
                            Explore Our Most Popular
                            Course <span>Categories</span>
                            <img class="title-shape lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/title-shape.png') }}" alt="Shape">
                        </h2>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up">
                    @if($categories->isEmpty())
                        <p class="text-center">No categories available at the moment.</p>
                    @else
                        <div class="swiper category-slider" id="category-slider-1" data-slides-per-view="5" data-swiper-loop="false">
                            <div class="swiper-wrapper">
                                @foreach($categories as $category)
                                    <div class="swiper-slide">
                                        <div class="card p-25 border radius-md">
                                            <div class="card-icon radius-md mb-20">
                                                <i class="{{ $category->icon }}"></i> <!-- Use icon class from array or default icon -->
                                            </div>
                                            <h6 class="card-title lc-1 mb-0">
                                                <a href="{{ route('courses', ['category' => $category->id]) }}" target="_self" title="{{ htmlspecialchars($category->name) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr style="margin-left: 30%; margin-right: 30%;">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-3.png') }}" alt="Shape">
            <img class="shape-2 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-1.png') }}" alt="Shape">
            <img class="shape-3 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-6.png') }}" alt="Shape">
            <img class="shape-4 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-4.png') }}" alt="Shape">
        </div>
    </section>
    <!-- Category-area end -->

    <!-- About-area start -->
    <section class="about-area about-area_v1 pt-100 pb-60 bg-primary-light">
        <div class="container">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="image mb-40 img-left">
                        <img class="lazyload blur-up" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/about-1.png') }}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="content-title pb-10">
                        <h2 class="title mb-30">
                            Transform Your Learning Experience <span>With Us</span>
                            <img class="title-shape lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/title-shape.png') }}" alt="Shape">
                        </h2>
                        <div class="content-text">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting lorem Ipsum has been the industrys standard dummy text ever since the when an unknown printer took a galley of type and dummy text Ipsum has.
                            </p>
                        </div>
                        <div class="info-list mt-40">
                            <div class="card bg-none mb-30">
                                <div class="card-icon radius-md">
                                    <i class="ico-quality"></i>
                                </div>
                                <div class="card-content">
                                    <h6 class="card-title mb-2">Course Complete Certificate</h6>
                                    <p class="card-text">Completed course get certificate </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-1.png') }}" alt="Shape">
            <img class="shape-2 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-3.png') }}" alt="Shape">
            <img class="shape-3 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-4.png') }}" alt="Shape">
        </div>
    </section>
    <!-- About-area end -->

    <!-- Course-area start -->
    <section class="course-area popular ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">
                            Most Popular <span>Course</span>
                            <img class="title-shape lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/title-shape.png') }}" alt="Shape">
                        </h2>
                        <div class="cta-btn">
                            <a href="{{ route('courses') }}" class="btn btn-lg btn-primary rounded-pill" title="See All Course" target="_self">See All Course</a>
                        </div>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up">
                    @if($courses->isEmpty())
                    <p class="text-center">No course available at the moment.</p>
                    @else
                    <div class="swiper category-slider" id="category-slider-1" data-slides-per-view="5" data-swiper-loop="false">
                        <div class="swiper-wrapper">
                            @foreach ($courses as $course)
                            <div class="swiper-slide">
                                <div class="course-default border radius-md mb-30">
                                    <figure class="course-img">
                                        <a href="#" title="Image" target="_self" class="lazy-container ratio ratio-2-3">
                                            <img class="lazyload" src="{{ asset('uploads/course/'. $course->image) }}" data-src="{{ asset('uploads/course/'. $course->image) }}" alt="course">
                                        </a>
                                        <div class="hover-show">
                                            <a href="{{ route('courseDetails',$course->slug) }}" class="btn btn-md btn-primary rounded-pill" title="Enroll Now" target="_self">Enroll Now</a>
                                        </div>
                                    </figure>
                                    <div class="course-details">
                                        <div class="p-3">
                                            <a href="#" target="_self" title="Design" class="tag font-sm color-primary mb-1">{{ $course->category->name }}</a>
                                            <h6 class="course-title lc-2 mb-0">
                                                <a href="{{ route('courseDetails',$course->slug) }}" target="_self" title="Link">
                                                    {{ Str::limit($course->courseTitle, 25, '...') }}
                                                </a>
                                            </h6>
                                            <div class="authors mt-15">
                                                <div class="author">
                                                    <img class="lazyload blur-up radius-sm" src="{{ asset('uploads/course/'. $course->image) }}" data-src="{{ asset('uploads/instructors/'. $course->instructor->image) }}" alt="Image">
                                                    <span class="font-sm">
                                                        <a href="#" target="_self" title="James Hobert">
                                                            {{ $course->instructor->user->name }}
                                                        </a>
                                                    </span>
                                                </div>
                                                <span class="font-sm icon-start"><i class="fas fa-clock"></i>{{ $course->courseDuration }}</span>
                                            </div>
                                        </div>
                                        <div class="course-bottom-info px-3 py-2">
                                            <span class="font-sm"><i class="fas fa-usd-circle"></i>$ {{ $course->price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-4.png') }}" alt="Shape">
            <img class="shape-2 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-1.png') }}" alt="Shape">
            <img class="shape-3 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-3.png') }}" alt="Shape">
            <img class="shape-4 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-6.png') }}" alt="Shape">
        </div>
    </section>
    <!-- Course-area end -->

    <!-- Counter-area start -->
    <div class="counter-area counter-area_v1 pt-100 pb-70 bg-img bg-cover" data-bg-image="{{ asset('assets/images/counter-bg.jpg') }}">
        <div class="overlay opacity-90 bg-primary"></div>
        <div class="container">
            <div class="counter-inner">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 mb-30" data-aos="fade-up">
                        <div class="card text-center bg-none">
                            <div class="card-icon mx-auto mb-15">
                                <img class="lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/icon/counter-icon-1.png') }}" alt="Image">
                            </div>
                            <div class="card-content">
                                <span class="h3 font-medium color-white mb-2"><span class="counter">500</span>+</span>
                                <p class="card-text color-white lh-1">Satisfied Students</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-30" data-aos="fade-up">
                        <div class="card text-center bg-none">
                            <div class="card-icon mx-auto mb-15">
                                <img class="lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/icon/counter-icon-2.png') }}" alt="Image">
                            </div>
                            <div class="card-content">
                                <span class="h3 font-medium color-white mb-2"><span class="counter">300</span>+</span>
                                <p class="card-text color-white lh-1">Online Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-30" data-aos="fade-up">
                        <div class="card text-center bg-none">
                            <div class="card-icon mx-auto mb-15">
                                <img class="lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="assets/images/icon/counter-icon-3.png" alt="Image">
                            </div>
                            <div class="card-content">
                                <span class="h3 font-medium color-white mb-2"><span class="counter">240</span>+</span>
                                <p class="card-text color-white lh-1">Verified mentor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-30" data-aos="fade-up">
                        <div class="card text-center bg-none">
                            <div class="card-icon mx-auto mb-15">
                                <img class="lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="assets/images/icon/counter-icon-4.png" alt="Image">
                            </div>
                            <div class="card-content">
                                <span class="h3 font-medium color-white mb-2"><span class="counter">100</span>%</span>
                                <p class="card-text color-white lh-1">Secure & Trusted Place</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="arrows d-none d-lg-block">
                    <img class="arrow lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/icon/line-arrow.png') }}" alt="Image">
                    <img class="arrow lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/icon/line-arrow.png') }}" alt="Image">
                    <img class="arrow lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/icon/line-arrow.png') }}" alt="Image">
                </div>
            </div>
        </div>
    </div>
    <!-- Counter-area end -->

    <!-- Course-area start -->
    <section class="course-area latest ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-30" data-aos="fade-up">
                        <h2 class="title mb-20">
                            Our Latest <span>Courses</span>
                            <img class="title-shape lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/title-shape.png') }}" alt="Shape">
                        </h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content" data-aos="fade-up">
                        <div class="tab-pane slide show active" id="tab1">
                            <div class="row">
                                @if ($latestCourses->isNotEmpty())
                                @foreach ($latestCourses as $lcourse)
                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="course-default border radius-md mb-30">
                                            <figure class="course-img">
                                                <a href="#" title="Image" target="_self" class="lazy-container ratio ratio-2-3">
                                                    <img class="lazyload" src="{{ asset('uploads/course/'. $lcourse->image) }}" data-src="{{ asset('uploads/course/'. $lcourse->image) }}" alt="course">
                                                </a>
                                                <div class="hover-show">
                                                    <a href="{{ route('courseDetails', $lcourse->slug) }}" class="btn btn-md btn-primary rounded-pill" title="Enroll Now" target="_self">Enroll Now</a>
                                                </div>
                                            </figure>
                                            <div class="course-details">
                                                <div class="p-3">
                                                    <a href="#" target="_self" title="Design" class="tag font-sm color-primary mb-1">{{ $lcourse->category->name }}</a>
                                                    <h6 class="course-title lc-2 mb-0">
                                                        <a href="{{ route('courseDetails',$lcourse->slug) }}" target="_self" title="Link">
                                                            {{ Str::limit($lcourse->courseTitle, 25, '...') }}
                                                        </a>
                                                    </h6>
                                                    <div class="authors mt-15">
                                                        <div class="author">
                                                            <img class="lazyload blur-up radius-sm" src="{{ asset('uploads/instructors/'.$lcourse->instructor->image) }}" data-src="{{ asset('uploads/instructors/'.$lcourse->instructor->image) }}" alt="Image">
                                                            <span class="font-sm">
                                                                <a href="course-details.html" target="_self" title="James Hobert">
                                                                    {{ $lcourse->instructor->user->name }}
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <span class="font-sm icon-start"><i class="fas fa-clock"></i>{{ $lcourse->courseDuration }}</span>
                                                    </div>
                                                </div>
                                                <div class="course-bottom-info px-3 py-2">
                                                    <span class="font-sm"><i class="fas fa-usd-circle"></i>${{ $lcourse->price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                                <p class="text-center">No course available at the moment.</p>
                                @endif
                            </div>
                            <div class="cta-btn text-center mt-15">
                                <a href="{{ route('courses') }}" class="btn btn-lg btn-primary rounded-pill" title="View More" target="_self">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-4.png') }}" alt="Shape">
            <img class="shape-2 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-6.png') }}" alt="Shape">
            <img class="shape-3 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-2.png') }}" alt="Shape">
            <img class="shape-4 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-1.png') }}" alt="Shape">
        </div>
    </section>
    <!-- Course-area end -->

    <!-- Mentor-area start -->
    <section class="mentor-area mentor-area_v1 pt-100 pb-70 bg-img bg-cover" data-bg-image="{{ asset('assets/images/mentor-bg-1.jpg') }}">
        <div class="overlay opacity-85 bg-primary-light"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title">
                            Meet Our Expert <span>Mentors</span>
                            <img class="title-shape lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/title-shape.png') }}" alt="Shape">
                        </h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        @if ($instructors->isNotEmpty())
                            @foreach ($instructors as $instructor)
                            <div class="col-lg-4 col-sm-6" data-aos="fade-up">
                                <div class="card radius-md mb-30">
                                    <div class="card-img">
                                        <a href="{{ route('mentorDetail', $instructor->id) }}" title="Image" target="_self" class="lazy-container ratio ratio-1-2">
                                            <img class="lazyload" src="{{ asset('uploads/instructors/'.$instructor->instructor->image) }}" data-src="{{ asset('uploads/instructors/'.$instructor->instructor->image) }}" alt="Image">
                                        </a>
                                    </div>
                                    <div class="card-content text-center">
                                        <h4 class="card-title lc-1 mb-1">
                                            <a href="mentor-details.html" target="_self" title="Link">
                                                {{ $instructor->name }}
                                            </a>
                                        </h4>
                                        <p class="card-text color-primary font-sm">
                                            {{ $instructor->instructor->skill }}
                                        </p>
                                        <div class="social-link justify-content-center">
                                            @if(!empty($instructor->instructor->instagram))
                                                <a href="{{ $instructor->instructor->instagram }}" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a>
                                            @endif
                                            @if(!empty($instructor->instructor->facebook))
                                                <a href="{{ $instructor->instructor->facebook }}" target="_blank" title="facebook"><i class="fab fa-facebook"></i></a>
                                            @endif
                                            @if(!empty($instructor->instructor->twitter))
                                                <a href="{{ $instructor->instructor->twitter }}" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a>
                                            @endif
                                            @if(!empty($instructor->instructor->twitter))
                                                <a href="{{ $instructor->instructor->twitter }}" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <p class="text-center">No mentors available at the moment.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-1.png') }}" alt="Shape">
            <img class="shape-2 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-3.png') }}" alt="Shape">
            <img class="shape-3 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-4.png') }}" alt="Shape">
        </div>
    </section>
    <!-- Mentor-area end -->

    <!-- Feature-area start -->
    <section class="feature-area feature-area_v1 pt-100 pb-60">
        <div class="container">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-5" data-aos="fade-up">
                    <div class="content-title mb-40">
                        <h2 class="title mb-0">
                            Which Features We Provide <span>For You</span>
                            <img class="title-shape lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/title-shape.png') }}" alt="Shape">
                        </h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card p-30 bg-primary-light radius-md mt-30">
                                    <div class="card-icon mb-20">
                                        <img class="lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/icon/enrollment.png') }}" alt="Image">
                                    </div>
                                    <h6 class="card-title lc-1 mb-0">
                                        <a href="{{ route('courses') }}" target="_self" title="Course Enrollment">
                                            Course Enrollment
                                        </a>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-30 bg-primary-light radius-md mt-30">
                                    <div class="card-icon mb-20">
                                        <img class="lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/icon/payment.png') }}" alt="Image">
                                    </div>
                                    <h6 class="card-title lc-1 mb-0">
                                        <a target="_self" title="Payment Gateway">
                                            Payment Gateway
                                        </a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-lg-first" data-aos="fade-up">
                    <div class="banner-img img-left mb-40">
                        <div class="lazy-container radius-lg ratio ratio-2-3">
                            <img class="lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/banner/video-banner-1.jpg') }}" alt="Image">
                        </div>
                        <a href="https://www.youtube.com/watch?v=bDJKs6r___g" class="video-btn youtube-popup p-absolute" title="Play Video">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-3.png') }}" alt="Shape">
            <img class="shape-2 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-1.png') }}" alt="Shape">
            <img class="shape-3 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-6.png') }}" alt="Shape">
            <img class="shape-4 lazyload" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('assets/images/shape/shape-4.png') }}" alt="Shape">
        </div>
    </section>
    <!-- Feature-area end -->

    <!-- Newsletter-area start -->
    <section class="newsletter-area newsletter-area_v1">
        <div class="container">
            <div class="newsletter-inner ptb-60 px-3 px-lg-5 radius-lg bg-img bg-cover" data-bg-image="{{ asset('assets/images/newsletter-bg-1.jpg') }}" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="content-title">
                            <h2 class="title mb-30">
                                Subscribe To Our
                                Newsletter
                            </h2>
                            <div class="newsletter-form">
                                <form id="newsletterForm">
                                    <div class="input-inline bg-white rounded-pill">
                                        <input class="form-control border-0" placeholder="Enter email here..." type="text" name="EMAIL">
                                        <button class="btn btn-lg btn-primary rounded-pill" type="submit" aria-label="button">Subscribe Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter-area end -->
@endsection

@section('customJs')
<script type="text/javascript">
    $("#newsletterForm").submit(function (e) {
        e.preventDefault();

        let subscribeButton = $(this).find("button");
        subscribeButton.prop("disabled", true);
        subscribeButton.html('<span class="button-loader"></span> Subscribing...'); // Show loader

        // Simulate a delay of 2 seconds
        setTimeout(() => {
            $.ajax({
                url: '/newsletter',
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"), // Include CSRF token
                },
                data: {
                    email: $(this).find("input[name='EMAIL']").val(),
                },
                dataType: "json",
                success: function (response) {
                    if (response.status) {
                        // Add a tick icon with the message
                        subscribeButton.html(
                            '<i class="fa fa-check-circle"></i> Subscribed Successfully!'
                        );
                    } else {
                        // Show the error message from the backend
                        subscribeButton.html(response.message);
                    }

                    setTimeout(() => {
                        subscribeButton.prop("disabled", false);
                        subscribeButton.html("Subscribe Now");
                    }, 3000); // Reset after 3 seconds
                },
                error: function () {
                    subscribeButton.html("Something Went Wrong");

                    setTimeout(() => {
                        subscribeButton.prop("disabled", false);
                        subscribeButton.html("Subscribe Now");
                    }, 3000); // Reset after 3 seconds
                },
            });
        }, 3000); // Delay before the AJAX call
    });
</script>
@endsection
