@extends('layouts.admin')

@section('admin-content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] px-4 group-data-[theme-width=box]:xl:px-0 ac-transition">
    <div class="col-span-full card flex items-center justify-between">
        <div>
            <!-- Title and Breadcrumb -->
            <h5 class="card-title">User</h5>
            <ul class="flex items-center flex-wrap gap-1.5 *:flex-center *:gap-1.5 leading-none text-gray-900 dark:text-dark-text mt-2">
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&amp;.current-page]:text-gray-500 dark:[&amp;.current-page]:text-dark-text-two">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&amp;.current-page]:text-gray-500 dark:[&amp;.current-page]:text-dark-text-two current-page">
                    <p>List Courses</p>
                </li>
            </ul>
        </div>
        <!-- Button on the right side -->
        <a href="{{ route('course.create') }}" class="btn b-light btn-info-light text-sm">
            Add New Course
        </a>
    </div>
    <div>
        @include('components.message')
    </div>
    <div class="card p-0 lg:min-h-[calc(100vh_-_theme('spacing.header')_*_1.4)] xl:min-h-[calc(100vh_-_theme('spacing.header')_*_1.6)]">
        <!-- Start All Language List Table -->
        <div class="p-3 sm:p-4">
            <div class="overflow-x-auto scrollbar-table">
                <table class="table-auto w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text leading-none">
                    <thead class="border-b border-gray-200 dark:border-dark-border font-semibold">
                        <tr>
                            <th class="px-3.5 py-4">Course Title</th>
                            <th class="px-3.5 py-4">Category</th>
                            <th class="px-3.5 py-4">Price</th>
                            <th class="px-3.5 py-4">Instructor</th>
                            <th class="px-3.5 py-4">Created At</th>
                            <th class="px-3.5 py-4 w-10">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
                        @foreach ($courses as $course)
                        <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-white">
                            <!-- Course Title & Thumbnail -->
                            <td class="flex items-center gap-2 px-3.5 py-4">
                                <a href="{{ route('course.show', $course->id) }}" class="size-[70px] rounded-50 overflow-hidden dk-theme-card-square">
                                    <img src="{{ asset('uploads/course/' . $course->image) }}" alt="thumb">
                                </a>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-dark-text-two mb-1.5">{{ $course->created_at->format('d M Y') }}</p>
                                    <h6 class="text-lg leading-none text-heading font-semibold line-clamp-1">
                                        <p>{{ Str::limit($course->courseTitle, 35) }}</p>
                                    </h6>
                                </div>
                            </td>

                            <!-- Course Category -->
                            <td class="px-3.5 py-4">
                                {{ $course->category->name ?? 'N/A' }}
                            </td>

                            <!-- Course Price -->
                            <td class="px-3.5 py-4">
                                {{ $course->price ? '$' . number_format($course->price, 2) : 'Free' }}
                            </td>

                            <!-- Course Instructor -->
                            <td class="px-3.5 py-4">
                                {{ $course->instructor->user->name ?? 'N/A' }}
                            </td>

                            {{-- <!-- Created By (Admin or Instructor) -->
                            <td class="px-3.5 py-4">
                                {{ $course->created_by_role == 'admin' ? 'Admin' : $course->creator->name }}
                            </td> --}}

                            <!-- Created At Date -->
                            <td class="px-3.5 py-4">
                                {{ $course->created_at->format('d M Y') }}
                            </td>

                            <!-- Actions -->
                            <td class="px-3.5 py-4">
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('course.edit', $course->id) }}" class="btn-icon btn-primary-icon-light size-7">
                                        <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                    </a>
                                    <button type="button" class="btn-icon btn-danger-icon-light size-7 delete-course" data-id="{{ $course->id }}">
                                        <i class="ri-delete-bin-line text-danger text-[13px]"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- End All Language List Table -->
    </div>
</div>

<!-- Start Delete Modal -->
<div id="deleteModal" tabindex="-1" class="hidden fixed inset-0 z-modal flex-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white dark:bg-dark-tooltip rounded-lg shadow dk-theme-card-square">
            <button type="button" data-modal-hide="deleteModal" class="absolute top-3 end-2.5 text-gray-500 dark:text-dark-text hover:bg-gray-200 dark:hover:bg-dark-icon rounded-lg size-8 flex-center dk-theme-card-square">
                <i class="ri-close-line text-inherit text-xl leading-none"></i>
            </button>
            <div class="p-4 md:p-5 text-center">
                <img src="{{ asset('dashboard/assets/images/icons/delete-record.png') }}" alt="delete" class="block h-12 mx-auto">
                <div class="mt-5 text-center">
                    <h5 class="mb-1">Are you sure?</h5>
                    <p class="text-slate-500 dark:text-zink-200">Are you certain you want to delete this record?</p>
                    <div class="flex justify-center gap-2 mt-6">
                        <button type="button" data-modal-hide="deleteModal" class="btn b-light btn-danger-light btn-sm">Cancel</button>
                        <button type="button" class="btn b-solid btn-danger-solid btn-sm confirm-delete">Yes, Delete It!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Delete Modal -->
@endsection

@section('customJs')
<script>

    let courseId; // Variable to hold Course ID for deletion
    // Show the delete confirmation modal and store the course ID
    document.querySelectorAll('.delete-course').forEach(button => {
        button.addEventListener('click', function() {
            courseId = this.dataset.id; // Get course ID from data attribute
            document.getElementById('deleteModal').classList.remove('hidden'); // Show modal
        });
    });

    // Confirm deletion action
    document.querySelector('.confirm-delete').addEventListener('click', function() {
        // Send AJAX request to delete the Course
        $.ajax({
            url: `/account/course/${courseId}`, // Use the course-specific route
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}' // Send CSRF token
            },
            success: function(response) {
                if (response.status) {
                    window.location.reload(); // Reload the page to see the changes
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr);
            }
        });

        // Hide the modal after deletion
        document.getElementById('deleteModal').classList.add('hidden');
    });

    // Close modal on cancel button
    document.querySelectorAll('[data-modal-hide="deleteModal"]').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('deleteModal').classList.add('hidden'); // Hide modal
        });
    });
</script>
@endsection
