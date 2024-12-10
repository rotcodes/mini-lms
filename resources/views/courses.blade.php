@extends('layouts.app')

@section('content')
<!-- Breadcrumb start -->
<div class="breadcrumb-area bg-img bg-cover" data-bg-image="{{ asset('assets/images/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="content text-center">
            <h2>Courses</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Courses</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb end -->

<!-- Course-area start -->
<div class="course-area pt-60 pb-75">
    <div class="container">
        <div class="row gx-xl-5">
            <div class="col-lg-4 col-xl-3">
                <!-- Spacer -->
                <div class="pb-40 d-none d-lg-block"></div>
                <div class="widget-offcanvas offcanvas-lg offcanvas-start" tabindex="-1" id="widgetOffcanvas" aria-labelledby="widgetOffcanvas">
                    <div class="offcanvas-header px-20">
                        <h4 class="offcanvas-title">Filter</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#widgetOffcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-0">
                        <aside class="widget-area px-20" data-aos="fade-up">
                            <!-- Category Filter -->
                            <div class="widget widget-categories py-20">
                                <h5 class="title">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categories">
                                        Categories
                                    </button>
                                </h5>
                                <div id="categories" class="collapse show">
                                    <div class="accordion-body mt-20 scroll-y">
                                        <ul class="list-group">
                                            @foreach ($categories as $category)
                                                <li class="list-item {{ $category->id == $categoryId ? 'open' : '' }}">
                                                    <a
                                                        href="{{ route('courses', ['category' => $category->id, 'sort' => $sortType, 'min' => $minPrice, 'max' => $maxPrice]) }}"
                                                        title="{{ $category->name }}"
                                                        target="_self"
                                                        class="category-toggle {{ $category->id == $categoryId ? 'active' : '' }}"
                                                    >
                                                        {{ $category->name }} <span class="qty">({{ $category->courses_count }})</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Price Filter -->
                            <div class="widget widget-price py-20">
                                <h5 class="title">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#price" aria-expanded="true" aria-controls="price">
                                        Price
                                    </button>
                                </h5>
                                <div id="price" class="collapse show">
                                    <div class="accordion-body mt-20 scroll-y">
                                        <form method="GET" action="{{ route('courses') }}" id="priceFilterForm">
                                            <!-- Include other filters as hidden inputs to retain them -->
                                            <input type="hidden" name="category" value="{{ $categoryId }}">
                                            <input type="hidden" name="sort" value="{{ $sortType }}">

                                            <div class="row gx-sm-3">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-20">
                                                        <label class="mb-1">Minimum</label>
                                                        <input
                                                            class="form-control size-md"
                                                            type="number"
                                                            name="min"
                                                            id="min"
                                                            value="{{ $minPrice }}"
                                                            placeholder="Min Price"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-20">
                                                        <label class="mb-1">Maximum</label>
                                                        <input
                                                            class="form-control size-md"
                                                            type="number"
                                                            name="max"
                                                            id="max"
                                                            value="{{ $maxPrice }}"
                                                            placeholder="Max Price"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row gx-2 gy-2">
                                                <div class="col-12 col-md-6">
                                                    <button type="submit" class="btn btn-primary w-100">Apply</button>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <a href="{{ route('courses') }}" class="btn btn-primary w-100">Reset</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>

            <!-- Sort Dropdown and Course List -->
            <div class="col-lg-8 col-xl-9">
                <!-- Spacer -->
                <div class="pb-40"></div>
                <div class="sort-area" data-aos="fade-up">
                    <div class="row align-items-center">
                        <!-- Display Course Count -->
                        <div class="col-lg-6">
                            <h5 class="mb-20">Found <span class="color-primary">{{ $courses->total() }}</span> Courses</h5>
                        </div>
                        <div class="col-6 d-lg-none">
                            <button class="btn btn-sm btn-outline icon-end radius-sm mb-20" type="button" data-bs-toggle="offcanvas" data-bs-target="#widgetOffcanvas" aria-controls="widgetOffcanvas">
                                Filter <i class="fal fa-filter"></i>
                            </button>
                        </div>

                        <!-- Sort By Dropdown -->
                        <div class="col-6">
                            <ul class="sort-list list-unstyled mb-20 text-end">
                                <li class="item">
                                    <div class="sort-item d-flex align-items-center">
                                        <label class="me-2 font-sm">Sort By:</label>
                                        <form method="GET" id="sortForm">
                                            <input type="hidden" name="category" value="{{ $categoryId }}">
                                            <input type="hidden" name="min" value="{{ $minPrice }}">
                                            <input type="hidden" name="max" value="{{ $maxPrice }}">

                                            <select name="sort" class="niceselect right" onchange="document.getElementById('sortForm').submit();">
                                                <option value="new" {{ $sortType === 'new' ? 'selected' : '' }}>Newest</option>
                                                <option value="old" {{ $sortType === 'old' ? 'selected' : '' }}>Oldest</option>
                                                <option value="price" {{ $sortType === 'price' ? 'selected' : '' }}>Price</option>
                                            </select>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Courses Display -->
                <div class="row" data-aos="fade-up">
                    @if ($courses->count() > 0)
                        @foreach ($courses as $course)
                            <div class="col-xl-4 col-sm-6">
                                <div class="course-default border radius-md mb-25">
                                    <figure class="course-img">
                                        <a href="{{ route('courseDetails', $course->slug) }}" title="Image" target="_self" class="lazy-container ratio ratio-2-3">
                                            <img class="lazyload" src="{{ asset('uploads/course/'.$course->image) }}" data-src="{{ asset('uploads/course/'.$course->image) }}" alt="course">
                                        </a>
                                        <div class="hover-show">
                                            <a href="{{ route('courseDetails', $course->slug) }}" class="btn btn-md btn-primary rounded-pill" title="Enroll Now" target="_self">Enroll Now</a>
                                        </div>
                                    </figure>
                                    <div class="course-details">
                                        <div class="p-3">
                                            <a target="_self" title="Design" class="tag font-sm color-primary mb-1">{{ $course->category->name }}</a>
                                            <h6 class="course-title lc-2 mb-0">
                                                <a href="{{ route('courseDetails', $course->slug) }}" target="_self" title="Link">
                                                    {{ Str::limit($course->courseTitle, 25, '...') }}
                                                </a>
                                            </h6>
                                            <div class="authors mt-15">
                                                <div class="author">
                                                    <img class="lazyload blur-up radius-sm" src="{{ asset('uploads/instructors/'.$course->instructor->image) }}" data-src="{{ asset('uploads/instructors/'.$course->instructor->image) }}" alt="Image">
                                                    <span class="font-sm">
                                                        <a href="course-details.html" target="_self" title="Instructor">
                                                            {{ Str::limit($course->instructor->user->name, 5, '...') }}
                                                        </a>
                                                    </span>
                                                </div>
                                                <span class="font-sm icon-start"><i class="fas fa-clock"></i>{{ $course->courseDuration }}</span>
                                            </div>
                                        </div>
                                        <div class="course-bottom-info px-3 py-2">
                                            <span class="font-sm"><i class="fas fa-usd-circle"></i>${{ $course->price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Pagination Links -->
                <nav class="pagination-nav mt-15 mb-25" data-aos="fade-up">
                    <ul class="pagination justify-content-center">
                        {{ $courses->appends(['category' => $categoryId, 'sort' => $sortType, 'min' => $minPrice, 'max' => $maxPrice])->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Course-area end -->

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
