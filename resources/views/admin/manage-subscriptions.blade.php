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
                    <p>Manage Subscriptions</p>
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
    <div class="card p-0 lg:min-h-[calc(100vh_-_theme('spacing.header')_*_1.4)] xl:min-h-[calc(100vh_-_theme('spacing.header')_*_1.6)]">
        <!-- Start All Language List Table -->
        <div class="p-3 sm:p-4">
            <div class="overflow-x-auto scrollbar-table">
                <table class="table-auto w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text leading-none">
                    <thead class="border-b border-gray-200 dark:border-dark-border font-semibold">
                        <tr>
                            <th class="px-3.5 py-4">Customer Name</th>
                            <th class="px-3.5 py-4">Purchased Course</th>
                            <th class="px-3.5 py-4">Payment Status</th>
                            <th class="px-3.5 py-4">Price</th>
                            <th class="px-3.5 py-4">Customer Email</th>
                            <th class="px-3.5 py-4">Purchase At</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
                        @if($orders->isNotEmpty())
                        @foreach ($orders as $order)
                        <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-white">
                            <!-- Course Title & Thumbnail -->
                            <td class="flex items-center gap-2 px-3.5 py-4">
                                <a class="size-[70px] rounded-50 overflow-hidden dk-theme-card-square">
                                    <img src="{{ !empty($order->user->student->image) ? asset('uploads/students/' . $order->user->student->image) : asset('path/to/default-image.jpg') }}" alt="thumb">
                                </a>
                                <div>
                                    <h6 class="text-lg leading-none text-heading font-semibold line-clamp-1">
                                        <p>{{ $order->user->name }}</p>
                                    </h6>
                                </div>
                            </td>

                            <!-- Course Category -->
                            <td class="px-3.5 py-4">
                                {{ Str::limit($order->course->courseTitle ?? 'N/A', 30, '...') }}
                            </td>

                            <!-- Course Status -->
                            <td class="px-4 py-3">
                                @if($order->status == 'success')
                                    <span class="badge badge-success-outline">Paid</span>
                                @else
                                    <span class="badge badge-warning-outline">Pending</span>
                                @endif
                            </td>

                            <!-- Course Price -->
                            <td class="px-3.5 py-4">
                                ${{ $order->amount ?? 'N/A' }}
                            </td>

                            <!-- Course Instructor -->
                            <td class="px-3.5 py-4">
                                {{ $order->user->email ?? 'N/A' }}
                            </td>

                            {{-- <!-- Created By (Admin or Instructor) -->
                            <td class="px-3.5 py-4">
                                {{ $course->created_by_role == 'admin' ? 'Admin' : $course->creator->name }}
                            </td> --}}

                            <!-- Created At Date -->
                            <td class="px-3.5 py-4">
                                {{ $order->created_at->format('d M Y') }}
                            </td>

                        </tr>
                        @endforeach
                        @else
                        <span class="badge badge-pill">No courses found. You haven't purchased any courses yet.</span>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- End All Language List Table -->
    </div>
</div>
@endsection
