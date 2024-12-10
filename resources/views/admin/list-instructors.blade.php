@extends('layouts.admin')

@section('admin-content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] px-4 group-data-[theme-width=box]:xl:px-0 ac-transition">
    <div class="col-span-full card flex items-center justify-between">
        <div>
            <!-- Title and Breadcrumb -->
            <ul class="flex items-center flex-wrap gap-1.5 *:flex-center *:gap-1.5 leading-none text-gray-900 dark:text-dark-text mt-2">
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&amp;.current-page]:text-gray-500 dark:[&amp;.current-page]:text-dark-text-two">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="text-primary-500 after:font-remix after:flex-center after:font-thin after:text-gray-900 after:size-5 after:content-['\ea6d'] after:translate-y-[1.4px] last:after:hidden [&amp;.current-page]:text-gray-500 dark:[&amp;.current-page]:text-dark-text-two current-page">
                    <p>List Instructors</p>
                </li>
            </ul>
        </div>
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
@endsection
