@extends('layouts.admin')

@section('admin-content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] px-4 group-data-[theme-width=box]:xl:px-0 ac-transition">
    <div class="col-span-full card flex items-center justify-between">
        <div>
            <!-- Title and Breadcrumb -->
            <h5 class="card-title">Admin</h5>
            <ul class="flex items-center flex-wrap gap-1.5 *:flex-center *:gap-1.5 leading-none text-gray-900 dark:text-dark-text mt-2">
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&amp;.current-page]:text-gray-500 dark:[&amp;.current-page]:text-dark-text-two">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&amp;.current-page]:text-gray-500 dark:[&amp;.current-page]:text-dark-text-two current-page">
                    <p>Create Category</p>
                </li>
            </ul>
        </div>
        <!-- Button on the right side -->
        <a href="{{ route('categories.index') }}" class="btn b-light btn-info-light text-sm">
            Back
        </a>
    </div>

    <!-- Start Create Course Category -->
    <form id="categoryForm" name="categoryForm" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-x-4">
            <div class="col-span-full lg:col-span-7 card p-4 lg:p-6">
                <div class="p-1.5">
                    <h6 class="card-title">Create Category</h6>
                    <div class="grid grid-cols-2 gap-x-4 gap-y-5 mt-7 pt-0.5">
                        <div class="col-span-full xl:col-auto leading-none">
                            <label for="name" class="form-label">Category Name *</label>
                            <input type="text" id="name" name="name" placeholder="Category Name" class="form-input">
                            <p class="text-red-500 text-xs mt-1 hidden" id="name-error"></p> <!-- Placeholder for name error -->
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-x-4 gap-y-5 mt-7 pt-0.5">
                        <div class="col-span-full xl:col-auto leading-none">
                            <label for="icon" class="form-label">Category Icon *</label>
                            <input type="text" id="icon" name="icon" placeholder="Category Icon Name" class="form-input">
                            <p class="text-red-500 text-xs mt-1 hidden" id="icon-error"></p> <!-- Placeholder for name error -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-full lg:col-span-5 card p-4 lg:p-6">
                <div class="p-1.5">
                    <h6 class="card-title">Add Media Files</h6>
                    <div class="mt-7 pt-0.5">
                        <p class="text-xs text-gray-500 dark:text-dark-text-two leading-none font-semibold mb-3">Thumbnail (828x490)</p>
                        <label for="thumbnailsrc" class="file-container ac-bg text-xs leading-none font-semibold mb-3 cursor-pointer aspect-[4/1.5] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border-four rounded-10 dk-theme-card-square">
                            <input type="file" id="thumbnailsrc" name="image" hidden class="img-src peer/file">
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
        </div>
    </form>
    <!-- End Create Course Category -->
</div>

@endsection

@section('customJs')
<script type="text/javascript">
    $("#categoryForm").submit(function(e){
        e.preventDefault(); // Prevent default form submission

        // Disable the submit button and show the loading state
        let submitButton = $("#submitButton");
        submitButton.prop('disabled', true);
        submitButton.html('<span class="button-loader"></span> Processing...'); // Add loader and update text

        $.ajax({
            url: '{{ route("categories.store") }}',
            type: "POST",
            data: new FormData(this), // Use FormData to handle file uploads
            processData: false, // Important for file uploads
            contentType: false, // Important for file uploads
            dataType: 'json',
            success: function (response) {
                submitButton.prop('disabled', false); // Re-enable the button
                submitButton.html('Save'); // Reset the button text

                if (response.status) {
                    window.location.href = '{{ route("categories.index") }}'; // Redirect to index on success
                } else {
                    // Handle errors
                    var errors = response.errors;
                    if (errors.name) {
                        $("#name").addClass('border-red-500'); // Add border color for error
                        $("#name-error").removeClass('hidden').text(errors.name[0]); // Show name error
                    } else {
                        $("#name").removeClass('border-red-500'); // Remove border color
                        $("#name-error").addClass('hidden'); // Hide name error
                    }
                    if (errors.icon) {
                        $("#icon").addClass('border-red-500'); // Add border color for error
                        $("#icon-error").removeClass('hidden').text(errors.icon[0]); // Show name error
                    } else {
                        $("#icon").removeClass('border-red-500'); // Remove border color
                        $("#icon-error").addClass('hidden'); // Hide name error
                    }
                    if (errors.image) {
                        $("#thumbnailsrc").addClass('border-red-500'); // Add border color for error
                        $("#image-error").removeClass('hidden').text(errors.image[0]); // Show image error
                    } else {
                        $("#thumbnailsrc").removeClass('border-red-500'); // Remove border color
                        $("#image-error").addClass('hidden'); // Hide image error
                    }
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
