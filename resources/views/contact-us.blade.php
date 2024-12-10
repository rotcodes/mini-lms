@extends('layouts.app')

@section('content')
    <!-- Breadcrumb start -->
    <div class="breadcrumb-area bg-img bg-cover" data-bg-image="assets/images/breadcrumb-bg.jpg">
        <div class="container">
            <div class="content text-center">
                <h2>Contact</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->

    <!-- Contact-area start -->
    <div class="contact-area pt-100 pb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card border radius-md mb-30" data-aos="fade-up">
                        <div class="icon radius-sm bg-primary-light">
                            <i class="fal fa-phone-plus"></i>
                        </div>
                        <div class="card-text">
                            <p><a href="tel:+990123456789">+990 123 456 789</a></p>
                            <p><a href="tel:+990456123789">+990 456 123 789</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border radius-md mb-30" data-aos="fade-up">
                        <div class="icon radius-sm bg-primary-light">
                            <i class="fal fa-envelope"></i>
                        </div>
                        <div class="card-text">
                            <p><a href="mailTo:live@example.com">live@example.com</a></p>
                            <p><a href="mailTo:info@example.com">info@example.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border radius-md mb-30" data-aos="fade-up">
                        <div class="icon radius-sm bg-primary-light">
                            <i class="fal fa-map-marker-alt"></i>
                        </div>
                        <div class="card-text">
                            <p>West Palm Beach, 4669, Travis Street, West London</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Spacer -->
            <div class="pb-70"></div>

            <div class="row gx-xl-5">
                <div class="section-title title-center mb-50">
                    <h2 class="title mb-0" data-aos="fade-up">
                        Get In Touch
                    </h2>
                </div>
                <div class="col-lg-6 mb-40" data-aos="fade-up">
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-20">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your name*">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-20">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Your email*">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-20">
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Your subject">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-20">
                                    <textarea name="message" id="message" class="form-control" cols="30" rows="8" placeholder="Your Message..."></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="custom-checkbox mb-20">
                                    <input class="input-checkbox" type="checkbox" name="checkbox" id="checkbox1" value="">
                                    <label class="form-check-label" for="checkbox1"><span> I agree with Appointly's Terms & Conditions <span class="color-red">*</span> </span></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-lg btn-primary rounded-pill" type="submit" aria-label="Send Message">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 mb-40" data-aos="fade-up">
                    <div class="map h-100 overflow-hidden radius-md">
                        <iframe class="lazyload h-100" id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1659780709118!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact-area end -->

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

    $("#contactForm").submit(function (e) {
    e.preventDefault();

    let sendButton = $(this).find("button");
    sendButton.prop("disabled", true);
    sendButton.html('<span class="button-loader"></span> Sending...'); // Show loader

    // Simulate a delay of 2 seconds
    setTimeout(() => {
        $.ajax({
            url: '/contact', // Contact form endpoint
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"), // Include CSRF token
            },
            data: {
                name: $("#name").val(),
                email: $("#email").val(),
                subject: $("#subject").val(),
                message: $("#message").val(),
                checkbox: $("#checkbox1").is(":checked") ? 1 : 0, // Checkbox value
            },
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    // Add a tick icon with the success message
                    sendButton.html('<i class="fa fa-check-circle"></i> Message Sent!');
                } else {
                    // Show the error message from the backend
                    sendButton.html(response.message);
                }

                setTimeout(() => {
                    sendButton.prop("disabled", false);
                    sendButton.html("Send Message");
                }, 3000); // Reset after 3 seconds
            },
            error: function () {
                sendButton.html("Something Went Wrong");

                setTimeout(() => {
                    sendButton.prop("disabled", false);
                    sendButton.html("Send Message");
                }, 3000); // Reset after 3 seconds
            },
        });
        }, 2000); // Delay before the AJAX call
    });


</script>
@endsection

