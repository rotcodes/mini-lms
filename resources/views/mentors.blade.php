@extends('layouts.app')

@section('content')
    <!-- Breadcrumb start -->
    <div class="breadcrumb-area bg-img bg-cover" data-bg-image="{{ asset('assets/images/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="content text-center">
                <h2>Mentor</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mentor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->

    <!-- Mentor-area start -->
    <section class="mentor-area mentor-area_v1 pt-100 pb-70">
        <div class="container">
            <div class="row">
                @if($instructors->IsNotEmpty())
                @foreach ($instructors as $instructor)
                <div class="col-lg-4 col-sm-6" data-aos="fade-up">
                    <div class="card radius-md mb-30">
                        <div class="card-img">
                            <a href="{{ route('mentorDetail', $instructor->user->id) }}" title="Image" target="_self" class="lazy-container ratio ratio-1-2">
                                <img class="lazyload" src="{{ asset('uploads/instructors/'.$instructor->image) }}" data-src="{{ asset('uploads/instructors/'.$instructor->image) }}" alt="Image">
                            </a>
                        </div>
                        <div class="card-content text-center">
                            <h4 class="card-title lc-1 mb-1">
                                <a href="mentor-details.html" target="_self" title="Link">
                                    {{ $instructor->user->name }}
                                </a>
                            </h4>
                            <p class="card-text color-primary font-sm">
                                {{ $instructor->skill }}
                            </p>
                            <div class="social-link justify-content-center">
                                @if(!empty($instructor->instagram))
                                    <a href="{{ $instructor->instagram }}" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if(!empty($instructor->facebook))
                                    <a href="{{ $instructor->facebook }}" target="_blank" title="facebook"><i class="fab fa-facebook"></i></a>
                                @endif
                                @if(!empty($instructor->twitter))
                                    <a href="{{ $instructor->twitter }}" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if(!empty($instructor->twitter))
                                    <a href="{{ $instructor->twitter }}" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-center">No mentor available rn.</p>
                @endif
            </div>
            <!-- Pagination Links -->
            <nav class="pagination-nav mt-15 mb-25" data-aos="fade-up">
                <ul class="pagination justify-content-center">
                    {{ $instructors->links() }}
                </ul>
            </nav>
        </div>
    </section>
    <!-- Mentor-area end -->

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
