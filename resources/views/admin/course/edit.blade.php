@extends('layouts.admin')

@section('admin-content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] px-4 group-data-[theme-width=box]:xl:px-0 ac-transition">
    <div class="col-span-full card flex items-center justify-between">
        <div>
            <!-- Title and Breadcrumb -->
            <h5 class="card-title">Edit Course</h5>
            <ul class="flex items-center flex-wrap gap-1.5 *:flex-center *:gap-1.5 leading-none text-gray-900 dark:text-dark-text mt-2">
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&.current-page]:text-gray-500 dark:[&.current-page]:text-dark-text-two">
                    <a href="{{ route('course.index') }}">List Courses</a>
                </li>
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&.current-page]:text-gray-500 dark:[&.current-page]:text-dark-text-two current-page">
                    <p>Edit Course</p>
                </li>
            </ul>
        </div>
        <!-- Button on the right side -->
        <a href="{{ route('course.index') }}" class="btn b-light btn-info-light text-sm">
            Back
        </a>
    </div>
    <div class="pb-4">
        <form id="msform" name="msform" action="{{ route('course.update', $course->id) }}" method="POST" class="*:hidden" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for updating -->

            <div class="fieldset !block">
                <div class="card p-4 lg:p-6">
                    <h6 class="card-title">Edit Course</h6>
                    <div class="grid grid-cols-2 gap-x-4 gap-y-5 mt-7 pt-0.5">
                        <div class="col-span-full lg:col-auto leading-none">
                            <label for="courseTitle" class="form-label">Course Title *</label>
                            <input type="text" id="courseTitle" name="courseTitle" placeholder="Course Title" class="form-input" autocomplete="off" value="{{ old('courseTitle', $course->courseTitle) }}">
                            <p class="text-red-500 text-xs mt-1 hidden" id="courseTitle-error"></p> <!-- Placeholder for name error -->
                        </div>
                        <div class="col-span-full lg:col-auto leading-none">
                            <label class="form-label">Courses Category</label>
                            <select class="singleSelect" name="courseCategory" id="courseCategory">
                                <option selected disabled>Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-red-500 text-xs mt-1 hidden" id="courseCategory-error"></p> <!-- Placeholder for name error -->
                        </div>
                        <div class="col-span-full lg:col-auto leading-none">
                            <label class="form-label">Instructor *</label>
                            <select name="instructor" id="instructor" class="form-input" required>
                                <option value="" disabled selected>Select an instructor</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}" {{ old('instructor', $course->instructor_id) == $instructor->id ? 'selected' : '' }}>
                                        {{ $instructor->user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-red-500 text-xs mt-1 hidden" id="instructor-error"></p> <!-- Placeholder for name error -->
                        </div>
                        <div class="col-span-full lg:col-auto leading-none">
                            <label class="form-label">Courses Label *</label>
                            <select class="singleSelect" id="courseLabel" name="courseLabel" data-minimum-results-for-search="Infinity">
                                <option selected disabled>Course Label</option>
                                @foreach ($labels as $label)
                                    <option value="{{ $label->id }}" {{ $course->label_id == $label->id ? 'selected' : '' }}>{{ $label->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-red-500 text-xs mt-1 hidden" id="courseLabel-error"></p> <!-- Placeholder for name error -->
                        </div>
                        <div class="col-span-full lg:col-auto leading-none">
                            <label for="price" class="form-label">Course Price *</label>
                            <input type="number" id="price" name="price" placeholder="Course Price" class="form-input" autocomplete="off" value="{{ old('price', $course->price) }}">
                            <p class="text-red-500 text-xs mt-1 hidden" id="price-error"></p> <!-- Placeholder for name error -->
                        </div>
                        <div class="col-span-full lg:col-auto leading-none">
                            <label for="courseDuration" class="form-label">Course duration *</label>
                            <input type="text" id="courseDuration" name="courseDuration" class="form-input" value="{{ old('courseDuration', $course->courseDuration) }}">
                            <p class="text-xs leading-none text-gray-900 dark:text-dark-text mt-2">
                                Please follow the pattern <span class="text-gray-500 dark:text-dark-text-two">(hh:mm:ss)</span>
                            </p>
                            <p class="text-red-500 text-xs mt-1 hidden" id="courseDuration-error"></p> <!-- Placeholder for name error -->
                        </div>
                        <div class="col-span-full">
                            <label class="form-label">Overview</label>
                            <textarea name="overview" id="overview" class="summernote">{{ old('overview', $course->overview) }}</textarea>
                            <p class="text-red-500 text-xs mt-1 hidden" id="overview-error"></p> <!-- Placeholder for name error -->
                        </div>
                        <div class="col-span-full">
                            <label class="form-label">Description</label>
                            <textarea name="desc" id="desc" class="summernote">{{ old('desc', $course->desc) }}</textarea>
                            <p class="text-red-500 text-xs mt-1 hidden" id="desc-error"></p> <!-- Placeholder for name error -->
                        </div>
                    </div>
                </div>

                <div class="fieldset">
                    <div class="card p-3 lg:p-6">
                        <h6 class="card-title">Add media files (Optional)</h6>
                        <div class="grid grid-cols-12 gap-4 mt-7">
                            <div class="col-span-full md:col-span-6 xl:col-span-4">
                                <p class="text-xs text-gray-500 dark:text-dark-text-two leading-none font-semibold mb-3">Thumbnail (548x234)</p>
                                <label for="thumbnailsrc" class="file-container ac-bg text-xs leading-none font-semibold cursor-pointer aspect-[4/1.5] min-h-[150px] max-w-full flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border-four rounded-10 dk-theme-card-square">
                                    <input type="file" id="thumbnailsrc" name="image" hidden class="img-src peer/file">
                                    <span class="flex-center flex-col peer-[.uploaded]/file:hidden">
                                        <span class="size-10 lg:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50">
                                            <img src="{{ asset('uploads/course/'.$course->image) }}" alt="icon" class="dark:brightness-200 dark:contrast-100 w-1/2 lg:w-auto">
                                        </span>
                                        <span class="mt-2 text-gray-500 dark:text-dark-text">Choose file</span>
                                    </span>
                                </label>
                                <p class="text-red-500 text-xs mt-1 hidden" id="image-error"></p> <!-- Placeholder for name error -->
                            </div>
                            <div class="col-span-full md:col-span-6 xl:col-span-4">
                                <p class="text-xs text-gray-500 dark:text-dark-text-two leading-none font-semibold mb-3">Main course file</p>
                                <label for="main-file-src" class="file-container ac-bg text-xs leading-none font-semibold cursor-pointer aspect-[4/1.5] min-h-[150px] max-w-full flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border-four rounded-10 dk-theme-card-square">
                                    <input type="file" id="main-file-src" hidden class="peer/file file-src">
                                    <span class="flex-center flex-col">
                                        <span class="size-10 lg:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50">
                                            <img src="{{ asset('dashboard/assets/images/icons/upload-file.svg') }}" alt="icon" class="dark:brightness-200 dark:contrast-100 w-1/2 lg:w-auto">
                                        </span>
                                        <span class="file-name text-gray-500 dark:text-dark-text mt-2">Choose file</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-span-full md:col-span-6 xl:col-span-4">
                                <p class="text-xs text-gray-500 dark:text-dark-text-two leading-none font-semibold mb-3">Introduction file</p>
                                <label for="intro-file-src" class="file-container ac-bg text-xs leading-none font-semibold cursor-pointer aspect-[4/1.5] min-h-[150px] max-w-full flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border-four rounded-10 dk-theme-card-square">
                                    <input type="file" id="intro-file-src" hidden class="peer/file file-src">
                                    <span class="flex-center flex-col">
                                        <span class="size-10 lg:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50">
                                            <img src="{{ asset('dashboard/assets/images/icons/upload-file.svg') }}" alt="icon" class="dark:brightness-200 dark:contrast-100 w-1/2 lg:w-auto">
                                        </span>
                                        <span class="file-name text-gray-500 dark:text-dark-text mt-2">Choose file</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="gap-4 mt-4">
                            <button type="submit" id="submitButton" class="next-form-btn btn b-solid btn-primary-solid btn-lg">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('customJs')
<script type="text/javascript">
    // Handle form submission for course update
    $("#msform").submit(function(e) {
        e.preventDefault(); // Prevent default form submission

        // Disable the submit button and show the loading state
        let submitButton = $("#submitButton");
        submitButton.prop('disabled', true);
        submitButton.html('<span class="button-loader"></span> Processing...'); // Add loader and update text

        $.ajax({
            url: '{{ route("course.update", $course->id) }}', // Update the URL to match course update route
            type: "POST",
            data: new FormData(this), // Use FormData to handle file uploads
            processData: false, // Important for file uploads
            contentType: false, // Important for file uploads
            dataType: 'json',
            success: function(response) {
                submitButton.prop('disabled', false); // Re-enable the button
                submitButton.html('Save'); // Reset the button text

                if (response.status) {
                    // Redirect to course index or show success message on success
                    window.location.href = '{{ route("course.index") }}';
                } else {
                    // Fields to check for errors
                    let fields = [
                        'courseTitle', 'courseCategory', 'instructor', 'courseLabel',
                        'price', 'courseDuration', 'overview', 'desc', 'image'
                    ];

                    // Loop through each field and handle errors
                    fields.forEach(field => {
                        if (response.errors[field]) {
                            $(`#${field}-error`).removeClass('hidden').text(response.errors[field][0]); // Show error message
                            $(`#${field}`).addClass('border-red-500'); // Add red border color for error field
                        } else {
                            $(`#${field}-error`).addClass('hidden').text(''); // Hide error message
                            $(`#${field}`).removeClass('border-red-500'); // Remove red border color for corrected field
                        }
                    });
                }
            },
            error: function(xhr) {
                $("#msform button[type='submit']").prop('disabled', false); // Re-enable the button on error
                console.error('An error occurred:', xhr);
            }
        });
    });

    // Listen for changes in input fields and hide errors when typing
    const fields = [
        'courseTitle', 'courseCategory', 'instructor', 'courseLabel',
        'price', 'courseDuration', 'overview', 'desc'
    ];

    fields.forEach(field => {
        $(`#${field}`).on('input change', function() {
            $(`#${field}-error`).addClass('hidden').text(''); // Hide error message
            $(`#${field}`).removeClass('border-red-500'); // Remove error border color
        });
    });

</script>
@endsection
