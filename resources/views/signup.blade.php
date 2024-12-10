@extends('layouts.admin')

@section('admin-content')
    <!-- Start Main Content -->
    <div class="main-content m-4">
        <div class="grid grid-cols-12 gap-y-7 sm:gap-7 card px-4 sm:px-10 2xl:px-[70px] py-15 lg:items-center lg:min-h-[calc(100vh_-_32px)] dk-theme-card-square">
            <!-- Start Overview Area -->
            <div class="col-span-full lg:col-span-6">
                <div class="flex flex-col items-center justify-center gap-10 text-center">
                    <div class="hidden sm:block">
                        <img src="{{ asset('dashboard/assets/images/loti/loti-auth.svg') }}" alt="loti" class="group-[.dark]:hidden">
                        <img src="{{ asset('dashboard/assets/images/loti/loti-auth-dark.svg') }}" alt="loti" class="group-[.light]:hidden">
                    </div>
                    <div>
                        <h3 class="text-xl md:text-[28px] leading-none font-semibold text-heading">
                            Create your account here
                        </h3>
                        <p class="font-medium text-gray-500 dark:text-dark-text mt-4 px-[10%]">
                            Sign up to create an account and access all features of our website.
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Overview Area -->

            <!-- Start Form Area -->
            <div class="col-span-full lg:col-span-6 w-full lg:max-w-[600px]">
                <div class="border border-form dark:border-dark-border p-5 md:p-10 rounded-20 md:rounded-30 dk-theme-card-square">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl md:text-[28px] leading-none font-semibold text-heading">
                            Sign Up
                        </h3>
                        <!-- Back to Home Link with Arrow Icon -->
                        <a href="{{ route('home') }}">
                            <h3 class="flex items-center text-gray-500 font-medium text-sm hover:underline">
                                Back to Home
                                <i class="ri-arrow-right-line ml-1"></i>
                            </h3>
                        </a>
                    </div>
                    <p class="font-medium text-gray-500 dark:text-dark-text mt-4">
                        Welcome! Create your account
                    </p>
                    <form action="{{ route('processSignup') }}" name="signupForm" id="signupForm" method="POST" class="leading-none mt-8">
                        @csrf

                        <div class="mb-2.5">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="full_name" name="full_name" placeholder="John Doe"  class="form-input px-4 py-3.5 rounded-lg">
                            <p class="text-red-500 text-xs mt-1 hidden" id="full_name-error"></p> <!-- Placeholder for image error -->
                        </div>

                        <div class="mt-5">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" placeholder="debra.holt@example.com"  class="form-input px-4 py-3.5 rounded-lg">
                            <p class="text-red-500 text-xs mt-1 hidden" id="email-error"></p> <!-- Placeholder for image error -->
                        </div>

                        <div class="mt-5">
                            <label for="password" class="form-label">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" placeholder="Password" class="form-input px-4 py-3.5 rounded-lg">
                                <label for="togglePassword" class="size-8 rounded-md flex-center hover:bg-gray-200 dark:hover:bg-dark-icon foucs:bg-gray-200 dark:foucs:bg-dark-icon position-center left-[95%]">
                                    <input type="checkbox" id="togglePassword" class="inputTypeToggle peer/it" hidden>
                                    <i class="ri-eye-off-line text-gray-500 dark:text-dark-text peer-checked/it:before:content-['\ecb5']"></i>
                                </label>
                            </div>
                            <p class="text-red-500 text-xs mt-1 hidden" id="password-error"></p> <!-- Placeholder for image error -->
                        </div>

                        <div class="mt-5">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <div class="relative">
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-input px-4 py-3.5 rounded-lg">
                                <label for="toggleConfirmPassword" class="size-8 rounded-md flex-center hover:bg-gray-200 dark:hover:bg-dark-icon foucs:bg-gray-200 dark:foucs:bg-dark-icon position-center left-[95%]">
                                    <input type="checkbox" id="toggleConfirmPassword" class="inputTypeToggle peer/it" hidden>
                                    <i class="ri-eye-off-line text-gray-500 dark:text-dark-text peer-checked/it:before:content-['\ecb5']"></i>
                                </label>
                            </div>
                            <p class="text-red-500 text-xs mt-1 hidden" id="confirm_password-error"></p> <!-- Placeholder for image error -->
                        </div>

                        <div class="mb-2.5 mt-4">
                            <!-- reCAPTCHA Widget -->
                            {!! NoCaptcha::display() !!}
                            <!-- Error Message for reCAPTCHA -->
                            <p class="text-red-500 text-xs mt-1 hidden" id="g-recaptcha-response-error"></p> <!-- Placeholder for reCAPTCHA error -->
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" id="submitButton" class="mt-5 next-form-btn btn b-solid btn-primary-solid w-full">
                            Sign Up
                        </button>
                    </form>
                    <div class="text-gray-900 dark:text-dark-text font-medium leading-none mt-5">
                        Have an account?
                        <a href="{{ route('login') }}" class="text-primary-500 font-semibold">Sign In</a>
                    </div>
                </div>
            </div>
            <!-- End Form Area -->
        </div>
    </div>
    <!-- End Main Content -->
@endsection

@section('customJs')
<script type="text/javascript">
    $("#signupForm").submit(function(e) {
        e.preventDefault(); // Prevent default form submission

        // Disable the submit button and show the loading state
        let submitButton = $("#submitButton");
        submitButton.prop('disabled', true);
        submitButton.html('<span class="button-loader"></span> Processing...'); // Add loader and update text

        $.ajax({
            url: '{{ route("processSignup") }}',
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                // Re-enable the button and reset the text
                submitButton.text('Sign Up').prop('disabled', false);

                if (response.status) {
                    // Reset reCAPTCHA widget if necessary
                    if (typeof grecaptcha !== 'undefined') {
                        grecaptcha.reset();
                    }

                    // Redirect to the email verification notice page
                    window.location.href = response.verification_url; // Redirect to verification.notice
                } else {
                    // Handle errors for form fields
                    let fields = ['full_name', 'email', 'password', 'confirm_password', 'g-recaptcha-response'];

                    fields.forEach(field => {
                        if (response.errors && response.errors[field]) {
                            $(`#${field}`).addClass('border-red-500');
                            $(`#${field}-error`).removeClass('hidden').text(response.errors[field][0]);
                        } else {
                            $(`#${field}`).removeClass('border-red-500');
                            $(`#${field}-error`).addClass('hidden').text('');
                        }
                    });

                    // Reset reCAPTCHA widget if necessary
                    if (typeof grecaptcha !== 'undefined') {
                        grecaptcha.reset();
                    }

                    // If no reCAPTCHA error, explicitly remove any previous error messages for reCAPTCHA
                    if (!response.errors || !response.errors['g-recaptcha-response']) {
                        $("#g-recaptcha-response").removeClass('border-red-500');
                        $("#g-recaptcha-response-error").addClass('hidden').text('');
                    }
                }
            },
            error: function (response) {
                // Re-enable the button and reset the text on error
                submitButton.text('Sign Up').prop('disabled', false);

                // Optional: Handle server-side errors
                console.log(response);
            }
        });
    });
</script>
@endsection
