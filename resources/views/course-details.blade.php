@extends('layouts.app')

@section('content')
    <!-- Course-details-area start -->
    <div class="course-details-area pb-60">
        <!-- Course title -->
        <div class="course-banner bg-img bg-cover pb-5" data-bg-image="{{ asset('assets/images/breadcrumb-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="banner-content" data-aos="fade-up">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Course Details</li>
                                </ol>
                            </nav>
                            <div>
                                @include('components.message')
                            </div>
                            <h3 class="title mb-15 mt-10">
                                {{ $course->courseTitle }}
                            </h3>
                            <p class="text mb-20">
                                Are you ready to take your {{ $course->courseTitle }} skills to the next level? Join us for our 100 Days of Code: The Complete {{ $course->courseTitle }} Pro Bootcamp for 2023!
                            </p>
                            <ul class="list-group list-group-horizontal align-items-center">
                                <li class="d-inline-block">
                                    <div class="ratings size-md gap-2">
                                        <span class="badge bg-success size-md">Bestseller</span>
                                        <div class="rate bg-img" data-bg-image="{{ asset('assets/images/rate-star-md.png') }}">
                                            <div class="rating-icon bg-img" data-bg-image="{{ asset('assets/images/rate-star-md.png') }}"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- course-description -->
        <div class="container">
            <div class="row gx-xl-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <!-- course-details-tab -->
                    <div class="course-details-tab pt-5">
                        <div class="tabs-navigation mb-40">
                            <ul class="nav nav-tabs" data-hover="fancyHover">
                                <li class="nav-item active">
                                    <button class="nav-link hover-effect btn-md rounded-pill active" data-bs-toggle="tab" data-bs-target="#tab1" type="button">Overview</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link hover-effect btn-md rounded-pill" data-bs-toggle="tab" data-bs-target="#tab3" type="button">Details</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link hover-effect btn-md rounded-pill" data-bs-toggle="tab" data-bs-target="#tab4" type="button">Instructor</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- Overview -->
                            <div class="tab-pane slide slide show active" id="tab1">
                                <div class="content pb-20">
                                    <h5 class="title mb-20">What you'll learn</h5>
                                    <p class="text">
                                        {!! $course->overview !!}
                                    </p>
                                </div>
                            </div>
                            <!-- Details -->
                            <div class="tab-pane" id="tab3">
                                <div class="overview pb-20">
                                    <h5 class="title mb-20">Description</h5>
                                    <p class="text">
                                        {!! $course->desc !!}
                                    </p>
                                </div>
                            </div>
                             <!-- Instructor -->
                             <div class="tab-pane slide" id="tab4">
                                <div class="mentor mb-40">
                                    <div class="mentor-info">
                                        <div class="mentor-img">
                                            <a href="mentor-details.html" target="_self" title="Link" class="lazy-container ratio ratio-1-1 radius-sm">
                                                <img class="lazyload" src="{{ asset('uploads/instructors/' . $course->instructor->image) }}" data-src="{{ asset('uploads/instructors/' . $course->instructor->image) }}" alt="Avatar">
                                            </a>
                                        </div>
                                        <div class="mentor-content">
                                            <h6 class="mb-1">
                                                <a href="mentor-details.html" target="_self" title="Link">{{ $course->instructor->user->name }}</a>
                                            </h6>
                                            <span class="subtitle font-sm">
                                                {{ $course->instructor->skill }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="content-text mt-20">
                                        <p>
                                            {!! $course->instructor->description !!}
                                        </p>
                                        <p>
                                            Whether you're just starting out in Oppida or looking to take your skills to the next level, Jose is the ideal guide to help you achieve your goals. With a focus on practical, hands-on learning, Jose will work with you to develop the skills and knowledge you need to succeed in Oppida.
                                        </p>
                                    </div>
                                    <div class="social-link icon-only mt-20">
                                        <span>Social Link:</span>
                                        <a href="{{ $course->instructor->instagram }}" target="_blank" title="instagram" class="color-primary"><i class="fab fa-instagram"></i></a>
                                        <a href="{{ $course->instructor->twitter }}" target="_blank" title="instagram" class="color-primary"><i class="fab fa-twitter"></i></a>
                                        <a href="{{ $course->instructor->facebook }}" target="_blank" title="instagram" class="color-primary"><i class="fab fa-facebook"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- More tab content... -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up">
                    <aside class="widget-area bg-white shadow-md radius-md">
                        <div class="widget widget-enroll p-25">
                            <figure class="course-img">
                                <a href="https://www.youtube.com/watch?v=bDJKs6r___g" title="Image" target="_self" class="lazy-container radius-sm ratio ratio-2-3 youtube-popup">
                                    <img class="lazyload" src="{{ asset('uploads/course/'.$course->image) }}" data-src="{{ asset('uploads/course/'.$course->image) }}" alt="course">
                                    <span class="video-btn p-absolute">
                                        <i class="fas fa-play"></i>
                                    </span>
                                    <div class="overlay"></div>
                                </a>
                            </figure>
                            <div class="course-price mt-15">
                                <h4 class="new-price">${{ $course->price }}</h4>
                            </div>
                            <div class="btn-groups mt-15">
                                <button id="submitButton"
                                        data-slug="{{ $course->slug }}"
                                        class="btn btn-lg btn-outline radius-sm w-100"
                                        title="Buy Now">Buy Now</button>
                            </div>
                            <div>
                                @include('components.message')
                            </div>
                            <div class="icon-start text-center mt-10 font-sm">
                                <span>30-Day Money-Back Guarantee</span>
                            </div>
                            <ul class="toggle-list list-unstyled mt-20" id="toggleList" data-toggle-show="5">
                                <li class="icon-start">
                                    <span>
                                        <i class="fal fa-clock"></i>
                                        <span class="name">Duration :</span>
                                    </span>
                                    <span>{{ $course->courseDuration }}</span>
                                </li>
                                <!-- More list items... -->
                            </ul>
                            <div class="btn-text show-more-btn" data-toggle-btn="toggleList">
                                Show More
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- Course-details-area start -->

    <!-- Course-area start -->
    <section class="course-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">Similar <span>Courses</span></h2>
                        <div class="cta-btn">
                            <a href="{{ route('courses') }}" class="btn btn-lg btn-primary rounded-pill" title="See All Course" target="_self">See All Course</a>
                        </div>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up">
                    @if($similarCourses->isEmpty())
                    <p class="text-center">No course available at the moment.</p>
                    @else
                    <div class="swiper category-slider" id="category-slider-1" data-slides-per-view="5" data-swiper-loop="false">
                        <div class="swiper-wrapper">
                            @foreach ($similarCourses as $course)
                            <div class="swiper-slide">
                                <div class="course-default border radius-md mb-30">
                                    <figure class="course-img">
                                        <a href="#" title="Image" target="_self" class="lazy-container ratio ratio-2-3">
                                            <img class="lazyload" src="{{ asset('uploads/course/'. $course->image) }}" data-src="{{ asset('uploads/course/'. $course->image) }}" alt="course">
                                        </a>
                                        <div class="hover-show">
                                            <a href="{{ route('courseDetails', $course->slug) }}" class="btn btn-md btn-primary rounded-pill" title="Enroll Now" target="_self">Enroll Now</a>
                                        </div>
                                    </figure>
                                    <div class="course-details">
                                        <div class="p-3">
                                            <a href="{{ route('courseDetails', $course->slug) }}" target="_self" title="Design" class="tag font-sm color-primary mb-1">{{ $course->category->name }}</a>
                                            <h6 class="course-title lc-2 mb-0">
                                                <a href="{{ route('courseDetails',$course->slug) }}" target="_self" title="Link">
                                                    {{ $course->courseTitle }}
                                                </a>
                                            </h6>
                                            <div class="authors mt-15">
                                                <div class="author">
                                                    <img class="lazyload blur-up radius-sm" src="{{ asset('uploads/course/'. $course->image) }}" data-src="{{ asset('uploads/instructors/'. $course->instructor->image) }}" alt="Image">
                                                    <span class="font-sm">
                                                        <a target="_self" title="James Hobert">
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
    </section>
    <!-- Course-area end -->
@endsection

@section('customJs')
<script>
    $('#submitButton').on('click', function() {
        // Retrieve the slug from the data attribute
        let slug = $(this).data('slug');

        // Disable the submit button and show the loading state
        let submitButton = $("#submitButton");
        submitButton.prop('disabled', true);
        submitButton.html('<span class="button-loader"></span> Processing...'); // Add loader and update text

        // Show loader for 3 seconds before making the AJAX request
        setTimeout(function() {
            // Make an AJAX request to create the Stripe session
            $.ajax({
                url: '/checkout/' + slug, // Use dynamic slug here
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Re-enable the button and reset the text
                    submitButton.html('Buy Now').prop('disabled', false);

                    if (response.status === false && response.redirect) {
                        // Redirect to login if not authenticated
                        window.location.href = response.redirect;
                    } else if (response.status === true && response.url) {
                        // Redirect to Stripe Checkout page if session created successfully
                        window.location.href = response.url;
                    } else {
                        alert(response.message || 'Failed to create checkout session');
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                    submitButton.html('Buy Now').prop('disabled', false); // Re-enable in case of error
                }
            });
        }, 3000); // 3-second delay
    });
</script>
@endsection
