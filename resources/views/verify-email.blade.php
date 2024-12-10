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
                            Whether you're launching a stunning online store  optimizing your our object-oriented
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Overview Area -->

            <!-- Start Form Area -->
            <div class="col-span-full lg:col-span-6 w-full lg:max-w-[600px]">
                <div class="border border-form dark:border-dark-border p-5 md:p-10 rounded-20 md:rounded-30 dk-theme-card-square">
                    <h3 class="text-xl md:text-[28px] leading-none font-semibold text-heading">
                        Email Verification
                    </h3>
                    <p class="font-medium text-gray-500 dark:text-dark-text mt-4">
                        We send a verification link to you, Check your email now?
                    </p>
                    <div>
                        @include('components.message')
                    </div>
                    <div class="text-gray-900 dark:text-dark-text font-medium leading-none mt-5">
                        You don't get it?
                        <form action="{{ route('verification.send') }}" method="POST" style="display:inline;">
                            @csrf <!-- Include the CSRF token for security -->
                            <button type="submit" class="text-primary-500 font-semibold bg-transparent border-none cursor-pointer">
                                Send again
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Form Area -->
        </div>
    </div>
    <!-- End Main Content -->
@endsection
