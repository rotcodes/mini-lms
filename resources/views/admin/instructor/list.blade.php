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
                    <p>List Instructors</p>
                </li>
            </ul>
        </div>
        <!-- Button on the right side -->
        <a href="{{ route('instructor.create') }}" class="btn b-light btn-info-light text-sm">
            Add New Instructor
        </a>
    </div>

    <div>
        @include('components.message')
    </div>
    <div class="card p-0 lg:min-h-[calc(100vh_-_theme('spacing.header')_*_1.4)] xl:min-h-[calc(100vh_-_theme('spacing.header')_*_1.6)]">
        <!-- Start All Instructor List Table -->
        <div class="p-3 sm:p-4">
            <div class="overflow-x-auto scrollbar-table">
                <table class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                    <thead>
                        <tr class="text-primary-500">
                            <th class="px-4 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg dk-theme-card-square">Name</th>
                            <th class="px-4 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg dk-theme-card-square">Email</th>
                            <th class="px-4 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg dk-theme-card-square">Phone</th>
                            <th class="px-4 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg dk-theme-card-square">Country</th>
                            <th class="px-4 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg dk-theme-card-square">Join Date</th>
                            <th class="px-4 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg dk-theme-card-square w-10">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
                        @if($instructors->isNotEmpty())
                            @foreach ($instructors as $instructor)
                            <tr>
                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3.5">
                                        <a href="#" class="size-12 rounded-50 overflow-hidden dk-theme-card-square">
                                            @if ($instructor->instructor && $instructor->instructor->image)
                                                <img src="{{ asset('uploads/instructors/' . $instructor->instructor->image) }}" alt="instructor">
                                            @else
                                                <img src="{{ asset('path/to/default-image.jpg') }}" alt="default instructor"> <!-- Fallback image -->
                                            @endif
                                        </a>
                                        <div>
                                            <h6 class="leading-none text-heading font-semibold">
                                                <a href="#">{{ $instructor->name }}</a>
                                            </h6>
                                            <p class="font-spline_sans text-sm font-light mt-1">
                                                {{ optional($instructor->instructor)->skill ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4">{{ $instructor->email }}</td>
                                <td class="px-4 py-4">{{ optional($instructor->instructor)->phone ?? 'N/A' }}</td>
                                <td class="px-4 py-4">{{ optional($instructor->instructor)->country ?? 'N/A' }}</td>
                                <td class="px-4 py-4">{{ $instructor->created_at->format('F d, Y') }}</td>
                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('instructor.edit', $instructor->id) }}" class="btn-icon btn-primary-icon-light size-7">
                                            <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                        </a>
                                        <button type="button" class="btn-icon btn-danger-icon-light size-7 delete-instructor" data-id="{{ $instructor->id }}">
                                            <i class="ri-delete-bin-line text-danger text-[13px]"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End All Instructor List Table -->
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

    let instructorId; // Variable to hold instructor ID for deletion
    // Show the delete confirmation modal and store the instructor ID
    document.querySelectorAll('.delete-instructor').forEach(button => {
        button.addEventListener('click', function() {
            instructorId = this.dataset.id; // Get instructor ID from data attribute
            document.getElementById('deleteModal').classList.remove('hidden'); // Show modal
        });
    });

    // Confirm deletion action
    document.querySelector('.confirm-delete').addEventListener('click', function() {
        // Send AJAX request to delete the instructor
        $.ajax({
            url: `/account/instructor/${instructorId}`, // Use the instructor-specific route
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
