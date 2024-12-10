@extends('layouts.admin')

@section('admin-content')
<!-- Start Main Content -->
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
                    <p>List Labels</p>
                </li>
            </ul>
        </div>
        <!-- Button on the right side -->
        <a href="#" class="btn b-light btn-info-light text-sm" data-modal-target="editModal" data-modal-toggle="editModal">
            Add New Label
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
                            <th class="px-3.5 py-4">Label</th>
                            <th class="px-3.5 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
                        @if ($courseLabels->isNotEmpty())
                            @foreach ($courseLabels as $label)
                            <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-white">
                                <td class="px-3.5 py-4">{{ $label->name }}</td>
                                <td class="px-3.5 py-4">
                                    <div class="flex items-center gap-1">
                                        <!-- Edit Button -->
                                        <button class="edit-label-button btn-icon btn-primary-icon-light size-7"
                                                data-id="{{ $label->id }}"
                                                data-name="{{ $label->name }}"
                                                data-modal-target="editModal"
                                                data-modal-toggle="editModal">
                                            <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                        </button>

                                        <!-- Delete Button -->
                                        <button class="btn-icon btn-danger-icon-light size-7 delete-label"
                                                data-id="{{ $label->id }}"
                                                data-modal-target="deleteModal"
                                                data-modal-toggle="deleteModal">
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
        <!-- End All Language List Table -->
    </div>
</div>
<!-- End Main Content -->

<!-- Start Edit Modal -->
<div id="editModal" tabindex="-1" class="hidden fixed inset-0 z-modal flex-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="p-4 w-full max-w-lg max-h-full">
        <div class="relative bg-white dark:bg-dark-tooltip rounded-lg shadow dk-theme-card-square">
            <button type="button" data-modal-hide="editModal" class="absolute top-3 end-2.5 text-gray-500 dark:text-dark-text hover:bg-gray-200 dark:hover:bg-dark-icon rounded-lg size-8 flex-center dk-theme-card-square">
                <i class="ri-close-line text-inherit text-xl leading-none"></i>
            </button>
            <div class="p-4 md:p-5">
                <!-- Adjusted Form -->
                <form name="labelForm" id="labelForm" method="POST" class="flex flex-col gap-4 mt-6">
                    @csrf
                    <!-- Add method field for PUT when updating -->
                    <input type="hidden" name="_method" id="formMethod" value="PUT">

                    <div>
                        <label for="label" class="form-label">Label Name *</label>
                        <!-- Input field with dynamic value based on create/update -->
                        <input type="text" id="label" name="label" class="form-input" placeholder="Label Name" autocomplete="off">
                        <p class="text-red-500 text-xs mt-1 hidden" id="label-error"></p> <!-- Placeholder for error -->
                    </div>
                    <div class="flex justify-end">
                        <!-- Submit button with dynamic text -->
                        <button type="submit" id="formButton" class="btn b-solid btn-primary-solid cursor-pointer shadow-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Modal -->

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
<script type="text/javascript">
    $(document).ready(function() {
        // Handle form submission
        $("#labelForm").submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            $("#labelForm button[type='submit']").prop('disabled', true); // Disable the submit button

            // Send AJAX request with form data
            $.ajax({
                url: labelForm.action, // Use the form's action attribute
                type: "POST", // Always use POST when using _method to simulate PUT/PATCH
                data: new FormData(this),
                processData: false, // Don't process the data
                contentType: false, // Don't set content type
                dataType: 'json',
                success: function(response) {
                    $("#labelForm button[type='submit']").prop('disabled', false); // Re-enable the button
                    if (response.status) {
                        window.location.href = '{{ route("course-label.index") }}'; // Redirect to index page
                    } else {
                        // Display validation errors
                        if (response.errors.label) {
                            $("#label").addClass('border-red-500'); // Add border color for error
                            $("#label-error").removeClass('hidden').text(response.errors.label[0]);
                        }
                    }
                },
                error: function(xhr) {
                    $("#labelForm button[type='submit']").prop('disabled', false); // Re-enable the button on error
                    console.error('An error occurred:', xhr);
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const editModal = document.getElementById('editModal');
        const labelForm = document.getElementById('labelForm');
        const formMethod = document.getElementById('formMethod');
        const formButton = document.getElementById('formButton');
        const labelInput = document.getElementById('label');

        // Function to open the modal in 'Create' mode
        function openCreateModal() {
            labelForm.action = '{{ route("course-label.store") }}'; // Set form action to store route
            formMethod.value = 'POST'; // Set method to POST
            formButton.textContent = 'Save'; // Set button text to 'Save'
            labelInput.value = ''; // Clear the input field
            editModal.classList.remove('hidden'); // Show the modal
        }

        function openEditModal(labelId, labelName) {
            labelForm.action = `/account/course-label/${labelId}`; // Use /admin/course-label/{id} to match resource route
            formMethod.value = 'PUT'; // Set method to PUT for update
            formButton.textContent = 'Update';
            labelInput.value = labelName; // Set input value to the existing label name
            editModal.classList.remove('hidden'); // Show the modal
        }


        // Add event listener for the 'Add New Label' button
        document.querySelector('[data-modal-target="editModal"]').addEventListener('click', function () {
            openCreateModal(); // Open modal in create mode
        });

        // Add event listeners for edit buttons
        document.querySelectorAll('.edit-label-button').forEach(button => {
            button.addEventListener('click', function () {
                const labelId = this.dataset.id; // Get label ID from data attribute
                const labelName = this.dataset.name; // Get label name from data attribute (Note: Use `name` here)
                openEditModal(labelId, labelName); // Open modal in edit mode
            });
        });
    });

    // DELETE MODAL
    let courseLabelId; // Variable to hold ID for deletion
    // Show the delete confirmation modal and store the courseLabel ID
    document.querySelectorAll('.delete-label').forEach(button => {
        button.addEventListener('click', function() {
            courseLabelId = this.dataset.id; // Get courseLabel ID from data attribute
            document.getElementById('deleteModal').classList.remove('hidden'); // Show modal
        });
    });

    // Confirm deletion action
    document.querySelector('.confirm-delete').addEventListener('click', function() {
        // Send AJAX request to delete the courseLabel
        $.ajax({
            url: `/account/course-label/${courseLabelId}`, // Use the courseLabel-specific route
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

