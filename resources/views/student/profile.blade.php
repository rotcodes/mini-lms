@extends('layouts.admin')

@section('admin-content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] px-4 group-data-[theme-width=box]:xl:px-0 ac-transition">
    <div class="col-span-full card flex items-center justify-between">
        <div>
            <!-- Title and Breadcrumb -->
            <h5 class="card-title">Student</h5>
            <ul class="flex items-center flex-wrap gap-1.5 *:flex-center *:gap-1.5 leading-none text-gray-900 dark:text-dark-text mt-2">
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&amp;.current-page]:text-gray-500 dark:[&amp;.current-page]:text-dark-text-two">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&amp;.current-page]:text-gray-500 dark:[&amp;.current-page]:text-dark-text-two current-page">
                    <p>My Profile</p>
                </li>
            </ul>
        </div>
        <!-- Button on the right side -->
        <a href="{{ route('admin.dashboard') }}" class="btn b-light btn-info-light text-sm">
            Back
        </a>
    </div>
    <div>
        @include('components.message')
    </div>
    <div class="pb-4">
        <form id="studentForm" name="studentForm">
            <!-- Basic Info -->
            <div class="fieldset">
                <div class="card p-4 lg:p-6">
                    <h6 class="card-title">Account</h6>
                    <div class="grid grid-cols-12 gap-5 mt-7">
                        <div class="col-span-full lg:col-span-6">
                            <label for="name-name" class="form-label">Name *</label>
                            <input value="{{ Auth::user()->name ?? '' }}" type="text" id="name" name="name" placeholder="Enter First Name" class="form-input" autocomplete="off">
                            <p class="text-red-500 text-xs mt-1 hidden" id="name-error"></p> <!-- Placeholder for name error -->
                        </div>
                        <div class="col-span-full lg:col-span-6">
                            <label for="user-email" class="form-label">Email *</label>
                            <input value="{{ Auth::user()->email ?? '' }}" type="email" id="email" name="email" placeholder="Enter Email" class="form-input" autocomplete="off">
                            <p class="text-red-500 text-xs mt-1 hidden" id="email-error"></p> <!-- Placeholder for email error -->
                        </div>
                        <div class="col-span-full lg:col-span-6">
                            <label for="phone" class="form-label">Phone *</label>
                            <input value="{{ Auth::user()->student->phone ?? '' }}" type="text" id="phone" name="phone" placeholder="Enter Phone" class="form-input" autocomplete="off">
                            <p class="text-red-500 text-xs mt-1 hidden" id="phone-error"></p> <!-- Placeholder for phone error -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Extra Information -->
            <div class="fieldset !block">
                <div class="card p-4 lg:p-6">
                    <h6 class="card-title">Extra Information</h6>
                    <div class="grid grid-cols-12 gap-5 mt-7">
                        <div class="col-span-full lg:col-span-6">
                            <label class="form-label">Country</label>
                            <select class="singleSelect" name="country" id="country">
                                <option disabled {{ empty(Auth::user()->student->country) ? 'selected' : '' }}>Select Country</option>
                                <option value="US" {{ (Auth::user()->student->country ?? '') == 'US' ? 'selected' : '' }}>United States</option>
                                <option value="CA" {{ (Auth::user()->student->country ?? '') == 'CA' ? 'selected' : '' }}>Canada</option>
                                <option value="GB" {{ (Auth::user()->student->country ?? '') == 'GB' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="AU" {{ (Auth::user()->student->country ?? '') == 'AU' ? 'selected' : '' }}>Australia</option>
                                <option value="DE" {{ (Auth::user()->student->country ?? '') == 'DE' ? 'selected' : '' }}>Germany</option>
                                <option value="FR" {{ (Auth::user()->student->country ?? '') == 'FR' ? 'selected' : '' }}>France</option>
                                <option value="PAK" {{ (Auth::user()->student->country ?? '') == 'PAK' ? 'selected' : '' }}>Pakistan</option>
                            </select>
                            <p class="text-red-500 text-xs mt-1 hidden" id="country-error"></p>
                        </div>
                        <div class="col-span-full lg:col-span-6">
                            <label class="form-label">City</label>
                            <select class="singleSelect" name="city" id="city">
                                <option disabled {{ empty(Auth::user()->student->city) ? 'selected' : '' }}>Select City</option>
                                <option value="NYC" {{ (Auth::user()->student->city ?? '') == 'NYC' ? 'selected' : '' }}>New York City</option>
                                <option value="LA" {{ (Auth::user()->student->city ?? '') == 'LA' ? 'selected' : '' }}>Los Angeles</option>
                                <option value="CHI" {{ (Auth::user()->student->city ?? '') == 'CHI' ? 'selected' : '' }}>Chicago</option>
                                <option value="HOU" {{ (Auth::user()->student->city ?? '') == 'HOU' ? 'selected' : '' }}>Houston</option>
                                <option value="PHX" {{ (Auth::user()->student->city ?? '') == 'PHX' ? 'selected' : '' }}>Phoenix</option>
                                <option value="PHI" {{ (Auth::user()->student->city ?? '') == 'PHI' ? 'selected' : '' }}>Philadelphia</option>
                                <option value="SA" {{ (Auth::user()->student->city ?? '') == 'SA' ? 'selected' : '' }}>San Antonio</option>
                                <option value="SD" {{ (Auth::user()->student->city ?? '') == 'SD' ? 'selected' : '' }}>San Diego</option>
                                <option value="DAL" {{ (Auth::user()->student->city ?? '') == 'DAL' ? 'selected' : '' }}>Dallas</option>
                                <option value="SLKT" {{ (Auth::user()->student->city ?? '') == 'SLKT' ? 'selected' : '' }}>Sialkot</option>
                            </select>
                            <p class="text-red-500 text-xs mt-1 hidden" id="city-error"></p>
                        </div>
                        <div class="col-span-full lg:col-span-6">
                            <label for="user-address" class="form-label">Address</label>
                            <input type="text" id="address" name="address" value="{{ Auth::user()->student->address ?? '' }}" placeholder="Address" class="form-input" autocomplete="off">
                            <p class="text-red-500 text-xs mt-1 hidden" id="address-error"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Images Info -->
            <div class="fieldset">
                <div class="card p-4 lg:p-6">
                    <div class="grid grid-cols-12 gap-x-4 mt-4">
                        <div class="col-span-full lg:col-span-5 card p-4 lg:p-6">
                            <h6 class="card-title">Add files</h6>
                            <div class="mt-7 pt-0.5">
                                <p class="text-xs text-gray-500 dark:text-dark-text-two leading-none font-semibold mb-3">Profile (200x200)</p>
                                <label for="image" class="file-container ac-bg text-xs leading-none font-semibold mb-3 cursor-pointer size-[200px] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border-four rounded-10 dk-theme-card-square">
                                    <input type="file" id="image" hidden name="image" class="img-src peer/file">
                                    <span class="flex-center flex-col peer-[.uploaded]/file:hidden">
                                        @if(Auth::user()->student && Auth::user()->student->image)
                                            <img src="{{ asset('uploads/students/' . Auth::user()->student->image) }}" alt="Profile Image" class="size-10 lg:size-15 rounded-50">
                                        @else
                                            <span class="size-10 lg:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50">
                                                <img src="{{ asset('dashboard/assets/images/icons/upload-file.svg') }}" alt="icon" class="dark:brightness-200 dark:contrast-100 w-1/2 lg:w-auto">
                                            </span>
                                            <span class="mt-2 text-gray-500 dark:text-dark-text">Choose file</span>
                                        @endif
                                    </span>
                                </label>
                            </div>
                            <p class="text-red-500 text-xs mt-1 hidden" id="image-error"></p>
                        </div>
                    </div>
                    <button type="submit" id="submitButton" class="mt-5 next-form-btn btn b-solid btn-primary-solid btn-lg">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('customJs')
<script type="text/javascript">
    $("#studentForm").submit(function(e){
        e.preventDefault(); // Prevent default form submission

        // Disable the submit button and show the loading state
        let submitButton = $("#submitButton");
        submitButton.prop('disabled', true);
        submitButton.html('<span class="button-loader"></span> Processing...'); // Add loader and update text

        $.ajax({
            url: '{{ route("student.update") }}',
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                submitButton.prop('disabled', false); // Re-enable the button
                submitButton.html('SUBMIT'); // Reset the button text

                if (response.status) {
                    window.location.href = '{{ route("student.profile") }}'; // Redirect to profile on success
                } else {
                    let fields = ['name', 'email', 'phone', 'password', 'country', 'city', 'address', 'image'];
                    fields.forEach(field => {
                        if (response.errors[field]) {
                            $(`#${field}`).addClass('border-red-500');
                            $(`#${field}-error`).removeClass('hidden').text(response.errors[field][0]);
                        } else {
                            $(`#${field}`).removeClass('border-red-500');
                            $(`#${field}-error`).addClass('hidden').text('');
                        }
                    });
                }
            },
            error: function(xhr) {
                submitButton.prop('disabled', false); // Re-enable the button on error
                submitButton.html('SUBMIT'); // Reset the button text
            }
        });
    });
</script>
@endsection
