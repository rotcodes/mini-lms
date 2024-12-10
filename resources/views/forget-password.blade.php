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
                            Forgot Password
                        </h3>
                        <p class="font-medium text-gray-500 dark:text-dark-text mt-4 px-[10%]">
                            It looks like you forgot your password. Please enter your email address we'll send you a password reset link.
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
                            Forgot Password
                        </h3>
                        <!-- Back to Home Link with Arrow Icon -->
                        <a href="{{ route('home') }}">
                            <h3 class="flex items-center text-gray-500 font-medium text-sm hover:underline">
                                Back to Login
                                <i class="ri-arrow-right-line ml-1"></i>
                            </h3>
                        </a>
                    </div>
                    <p class="font-medium text-gray-500 dark:text-dark-text mt-4">
                        Please enter your email address and we'll send you a password reset link.
                    </p>
                    <div>
                        @include('components.message')
                    </div>
                    <form action="{{ route('processForgotPassword') }}" method="POST" class="leading-none mt-8">
                        @csrf
                        <div class="mb-7">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" placeholder="debra.holt@example.com" required autocomplete="off" class="form-input px-4 py-3.5 rounded-lg">
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn b-solid btn-primary-solid w-full">Forgot Password</button>
                    </form>
                    <div class="text-gray-900 dark:text-dark-text font-medium leading-none mt-5">
                        Back to /
                        <a href="{{ route('login') }}" class="text-primary-500 font-semibold">Sign in</a>
                    </div>
                </div>
            </div>
            <!-- End Form Area -->
        </div>
    </div>
    <!-- End Main Content -->
@endsection
