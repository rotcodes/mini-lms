@extends('layouts.admin')

@section('admin-content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] px-4 group-data-[theme-width=box]:xl:px-0 ac-transition">
    <div class="col-span-full card flex items-center justify-between">
        <div>
            <!-- Title and Breadcrumb -->
            <h5 class="card-title">Admin</h5>
            <ul class="flex items-center flex-wrap gap-1.5 *:flex-center *:gap-1.5 leading-none text-gray-900 dark:text-dark-text mt-2">
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&amp;.current-page]:text-gray-500 dark:[&amp;.current-page]:text-dark-text-two">
                    <a href="{{ route('instructor.index') }}">List Instructors</a>
                </li>
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&amp;.current-page]:text-gray-500 dark:[&amp;.current-page]:text-dark-text-two current-page">
                    <p>Create Instructor</p>
                </li>
            </ul>
        </div>
        <!-- Button on the right side -->
        <a href="{{ route('instructor.index') }}" class="btn b-light btn-info-light text-sm">
            Back
        </a>
    </div>
    <!-- Start New Course Category -->
    <form id="instructorForm" name="instructorForm" action="{{ route('instructor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-x-4">
            <div class="col-span-full lg:col-span-7 card p-4 lg:p-6">
                <h6 class="card-title">Add New Instructor</h6>
                <div class="grid grid-cols-12 gap-x-4 gap-y-5 mt-7 pt-0.5">
                    <!-- First Name Field -->
                    <div class="col-span-full lg:col-span-6 leading-none">
                        <label for="name" class="form-label">Full Name *</label>
                        <input type="text" id="name" name="name" placeholder="Full Name" class="form-input" autocomplete="off">
                        <p class="text-red-500 text-xs mt-1 hidden" id="name-error"></p> <!-- Placeholder for name error -->
                    </div>

                    <!-- Email Field -->
                    <div class="col-span-full lg:col-span-6 leading-none">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" id="email" name="email" placeholder="Email" class="form-input" autocomplete="off">
                        <p class="text-red-500 text-xs mt-1 hidden" id="email-error"></p> <!-- Placeholder for email error -->
                    </div>

                    <div class="col-span-full lg:col-span-6 leading-none">
                        <label for="password" class="form-label">Password *</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="form-input" autocomplete="off">
                        <p class="text-red-500 text-xs mt-1 hidden" id="password-error"></p> <!-- Placeholder for email error -->
                    </div>

                    <!-- Phone Number Field -->
                    <div class="col-span-full lg:col-span-6 leading-none">
                        <label for="phone" class="form-label">Phone Number *</label>
                        <input type="number" id="phone" name="phone" placeholder="Phone Number" class="form-input" autocomplete="off">
                        <p class="text-red-500 text-xs mt-1 hidden" id="phone-error"></p> <!-- Placeholder for phone error -->
                    </div>


                    <!-- skill Field -->
                    <div class="col-span-full lg:col-span-12 leading-none">
                        <label for="skill" class="form-label">Skil *</label>
                        <input type="skill" id="skill" name="skill" placeholder="Skill" class="form-input" autocomplete="off">
                        <p class="text-red-500 text-xs mt-1 hidden" id="skill-error"></p> <!-- Placeholder for email error -->
                    </div>

                    <!-- Country Field -->
                    <div class="col-span-full lg:col-span-4 leading-none">
                        <label class="form-label">Country *</label>
                        <select class="singleSelect" id="country" name="country">
                            <option selected disabled>Select Country</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="GB">United Kingdom</option>
                            <option value="AU">Australia</option>
                            <option value="DE">Germany</option>
                            <option value="FR">France</option>
                        </select>
                        <p class="text-red-500 text-xs mt-1 hidden" id="country-error"></p> <!-- Placeholder for country error -->
                    </div>

                    <!-- City Field -->
                    <div class="col-span-full lg:col-span-4 leading-none">
                        <label class="form-label">City *</label>
                        <select class="singleSelect" id="city" name="city">
                            <option selected disabled>Select City</option>
                            <option value="NYC">New York City</option>
                            <option value="LA">Los Angeles</option>
                            <option value="CHI">Chicago</option>
                            <option value="HOU">Houston</option>
                            <option value="PHX">Phoenix</option>
                            <option value="PHI">Philadelphia</option>
                            <option value="SA">San Antonio</option>
                        </select>
                        <p class="text-red-500 text-xs mt-1 hidden" id="city-error"></p> <!-- Placeholder for city error -->
                    </div>

                    <!-- Address Field -->
                    <div class="col-span-full leading-none">
                        <label for="address" class="form-label">Address *</label>
                        <input type="text" id="address" name="address" placeholder="Your Address" class="form-input" autocomplete="off">
                        <p class="text-red-500 text-xs mt-1 hidden" id="address-error"></p> <!-- Placeholder for address error -->
                    </div>

                    <!-- Instagram Field -->
                    <div class="col-span-full lg:col-span-6 leading-none">
                        <label for="instagram" class="form-label">Instagram *</label>
                        <input type="url" id="instagram" name="instagram" placeholder="Instagram URL" class="form-input" autocomplete="off">
                        <p class="text-red-500 text-xs mt-1 hidden" id="instagram-error"></p> <!-- Placeholder for Instagram error -->
                    </div>

                    <!-- Facebook Field -->
                    <div class="col-span-full lg:col-span-6 leading-none">
                        <label for="facebook" class="form-label">Facebook *</label>
                        <input type="url" id="facebook" name="facebook" placeholder="Facebook URL" class="form-input" autocomplete="off">
                        <p class="text-red-500 text-xs mt-1 hidden" id="facebook-error"></p> <!-- Placeholder for Facebook error -->
                    </div>

                    <!-- Twitter Field -->
                    <div class="col-span-full lg:col-span-6 leading-none">
                        <label for="twitter" class="form-label">Twitter *</label>
                        <input type="url" id="twitter" name="twitter" placeholder="Twitter URL" class="form-input" autocomplete="off">
                        <p class="text-red-500 text-xs mt-1 hidden" id="twitter-error"></p> <!-- Placeholder for Twitter error -->
                    </div>

                    <div class="col-span-full leading-none">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="description" class="summernote"></textarea>
                        <p class="text-red-500 text-xs mt-1 hidden" id="description-error"></p>
                    </div>
                </div>
            </div>

            <!-- Profile Image Upload Field -->
            <div class="col-span-full lg:col-span-5 card p-4 lg:p-6">
                <h6 class="card-title">Add media files</h6>
                <div class="mt-7 pt-0.5">
                    <p class="text-xs text-gray-500 dark:text-dark-text-two leading-none font-semibold mb-3">Profile (200x200)</p>
                    <label for="thumbnailsrc" class="file-container ac-bg text-xs leading-none font-semibold mb-3 cursor-pointer size-[200px] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border-four rounded-10 dk-theme-card-square">
                        <input type="file" id="thumbnailsrc" hidden name="image" class="img-src peer/file">
                        <span class="flex-center flex-col peer-[.uploaded]/file:hidden">
                            <span class="size-10 lg:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50">
                                <img src="{{ asset('dashboard/assets/images/icons/upload-file.svg') }}" alt="icon" class="dark:brightness-200 dark:contrast-100 w-1/2 lg:w-auto">
                            </span>
                            <span class="mt-2 text-gray-500 dark:text-dark-text">Choose file</span>
                        </span>
                    </label>
                    <p class="text-red-500 text-xs mt-1 hidden" id="image-error"></p> <!-- Placeholder for image error -->
                </div>
                <button type="submit" id="submitButton" class="btn b-solid btn-primary-solid btn-lg w-max mt-2">Save</button>
            </div>
        </div>
    </form>
    <!-- End New Course Category -->
</div>
@endsection

@section('customJs')
<script type="text/javascript">
    // Use the new form ID
    $("#instructorForm").submit(function(e){
    e.preventDefault(); // Prevent default form submission

    // Disable the submit button and show the loading state
    let submitButton = $("#submitButton");
    submitButton.prop('disabled', true);
    submitButton.html('<span class="button-loader"></span> Processing...'); // Add loader and update text

    $.ajax({
        url: '{{ route("instructor.store") }}', // Update the URL to match instructor store route
        type: "POST",
        data: new FormData(this), // Use FormData to handle file uploads
        processData: false, // Important for file uploads
        contentType: false, // Important for file uploads
        dataType: 'json',
        success: function (response) {
            submitButton.prop('disabled', false); // Re-enable the button
            submitButton.html('Save'); // Reset the button text

            if (response.status) {
                window.location.href = '{{ route("instructor.index") }}'; // Redirect to index on success
            } else {
                // Fields to check for errors
                let fields = [
                    'name', 'phone', 'email', 'password', 'skill', 'country',
                    'city', 'address', 'instagram', 'facebook', 'twitter', 'description', 'image'
                ];

                // Loop through each field and handle errors
                fields.forEach(field => {
                    if (response.errors[field]) {
                        $(`#${field}`).addClass('border-red-500'); // Add border color for error
                        $(`#${field}-error`).removeClass('hidden').text(response.errors[field][0]); // Show error message
                    } else {
                        $(`#${field}`).removeClass('border-red-500'); // Remove border color
                        $(`#${field}-error`).addClass('hidden').text(''); // Hide error message
                    }
                });
            }
        },
        error: function(xhr) {
            submitButton.prop('disabled', false); // Re-enable the button on error
            submitButton.html('Save'); // Reset the button text on error
        }
    });
});
</script>
@endsection


