@extends('layouts.app')

@section('content')
    <!-- Breadcrumb start -->
    <div class="breadcrumb-area bg-img bg-cover" data-bg-image="{{ asset('assets/images/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="content text-center">
                <h2>Mentor Details</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mentor Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->

    <!-- Mentor-details-area start -->
    <section class="mentor-details pt-100 pb-60">
        <div class="container">
            <div class="row gx-xl-5 align-items-center">
                <div class="col-xl-4 col-lg-5">
                    <div class="content-img mb-40" data-aos="fade-up">
                        <div class="lazy-container ratio ratio-1-1 radius-md">
                            <img class="lazyload blur-up" src="{{ asset('assets/images/placeholder.png') }}" data-src="{{ asset('uploads/instructors/'. $instructor->image) }}" alt="{{ $instructor->user->name }}">
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="content-title mb-40" data-aos="fade-up">
                        <h3 class="title mt-0 mb-1">{{ $instructor->user->name }}</h3>
                        <span class="subtitle font-sm">
                            Skill: {{ $instructor->skill }}
                        </span>
                        <div class="content-text mt-20">
                            <p>About :</p>
                            <?php
                            // Split details by newlines to create separate paragraphs
                            $paragraphs = explode("\n", $instructor->description);

                            // Loop through each paragraph and wrap it in <p> tags
                            foreach ($paragraphs as $paragraph) {
                                // Trim any extra spaces or newlines and only output if not empty
                                $paragraph = trim($paragraph);
                                if (!empty($paragraph)) {
                                    echo "<p>{$paragraph}</p>";
                                }
                            }
                            ?>
                        </div>
                        <div class="social-link icon-only mt-25">
                            <span>Social Link:</span>
                            <a href="{{ $instructor->instagram }}" target="_blank" title="instagram" class="color-primary"><i class="fab fa-instagram"></i></a>
                            <a href="{{ $instructor->twitter }}" target="_blank" title="twitter" class="color-primary"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $instructor->facebook }}" target="_blank" title="facebook" class="color-primary"><i class="fab fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Mentor-details-area end -->

    <!-- Course-area start -->
    <section class="course-area popular pb-100">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">Courses By <span>{{ $instructor->user->name }}</span></h2>
                    </div>
                </div>
                <div class="col-12">
                    @if($instructorCourse->isEmpty())
                    <p class="text-center">No course available at the moment.</p>
                    @else
                    <div class="swiper category-slider" id="category-slider-1" data-slides-per-view="4" data-aos="fade-up">
                        <div class="swiper-wrapper">
                            @foreach ($instructorCourse as $course)
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
    </section>
    <!-- Course-area end -->
@endsection
