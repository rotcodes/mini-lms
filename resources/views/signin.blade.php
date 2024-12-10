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
                            Welcome back!
                        </h3>
                        <p class="font-medium text-gray-500 dark:text-dark-text mt-4 px-[10%]">
                            Sign in to access your dashboard, we have made this experience easy for you.
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Overview Area -->

            <!-- Start Form Area -->
            <div class="col-span-full lg:col-span-6 w-full lg:max-w-[600px]">
                <div class="border border-form dark:border-dark-border p-5 md:p-10 rounded-20 md:rounded-30 dk-theme-card-square">
                    <!-- Flex Container for Sign In and Back to Home Link -->
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl md:text-[28px] leading-none font-semibold text-heading">
                            Sign In
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
                        Sign in to your account
                    </p>
                    @include('components.message')
                    <form action="{{ route('processLogin') }}" method="POST" class="leading-none mt-8">
                        @csrf
                        <div class="mb-2.5">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="{{ old('email') }}" id="email" name="email" placeholder="debra.holt@example.com" class="@error('email') is-invalid @enderror form-input px-4 py-3.5 rounded-lg">
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <label for="password" class="form-label">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror form-input px-4 py-3.5 rounded-lg">
                                <label for="toggleInputType" class="size-8 rounded-md flex-center hover:bg-gray-200 dark:hover:bg-dark-icon foucs:bg-gray-200 dark:foucs:bg-dark-icon position-center left-[95%]">
                                    <input type="checkbox" id="toggleInputType" class="inputTypeToggle peer/it" hidden>
                                    <i class="ri-eye-off-line text-gray-500 dark:text-dark-text peer-checked/it:before:content-['\ecb5']"></i>
                                </label>
                            </div>
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2.5 mt-4">
                            <!-- Render the reCAPTCHA widget -->
                            {!! NoCaptcha::display() !!}
                            <!-- Error Message for reCAPTCHA -->
                            @error('g-recaptcha-response')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between mt-3 mb-7">
                            <a href="{{ route('forgetPassword') }}" class="text-xs leading-none text-primary-500 font-semibold">Forgot password?</a>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn b-solid btn-primary-solid w-full">Sign In</button>
                    </form>
                    <div class="text-gray-900 dark:text-dark-text font-medium leading-none mt-5">
                        Don't have an account yet?
                        <a href="{{ route('signup') }}" class="text-primary-500 font-semibold">Sign Up</a>
                    </div>
                </div>
            </div>
            <!-- End Form Area -->
        </div>
    </div>
    <!-- End Main Content -->
@endsection
