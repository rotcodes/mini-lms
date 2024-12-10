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
                            Reset Password!
                        </h3>
                        <p class="font-medium text-gray-500 dark:text-dark-text mt-4 px-[10%]">
                            Enter your new password to complete the process.
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Overview Area -->

            <!-- Start Form Area -->
            <div class="col-span-full lg:col-span-6 w-full lg:max-w-[600px]">
                <div class="border border-form dark:border-dark-border p-5 md:p-10 rounded-20 md:rounded-30 dk-theme-card-square">
                    <h3 class="text-xl md:text-[28px] leading-none font-semibold text-heading">
                        Create a New Password
                    </h3>
                    <p class="font-medium text-gray-500 dark:text-dark-text mt-4">
                        Please enter a new password
                    </p>
                    <form action="{{ route('processResetPassword') }}" method="POST" class="leading-none mt-8">
                        @csrf
                        <div class="mt-5">
                            <div class="mt-5 mb-7">
                                <input type="hidden" hidden name="token" value="{{ $tokenString }}">
                                <label for="new_password" class="form-label">New Password</label>
                                <div class="relative">
                                    <input type="password" id="new_password" name="new_password" placeholder="New Password" class="form-input px-4 py-3.5 rounded-lg">
                                    <label for="toggleNewPass" class="size-8 rounded-md flex-center hover:bg-gray-200 dark:hover:bg-dark-icon foucs:bg-gray-200 dark:foucs:bg-dark-icon position-center left-[95%]">
                                        <input type="checkbox" id="toggleNewPass" class="inputTypeToggle peer/it" hidden>
                                        <i class="ri-eye-off-line text-gray-500 dark:text-dark-text peer-checked/it:before:content-['\ecb5']"></i>
                                    </label>
                                </div>
                                @error('new_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn b-solid btn-primary-solid w-full mt-5">Submit</button>
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
