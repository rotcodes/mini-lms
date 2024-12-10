<div id="app-drawer" class="app-menu flex flex-col bg-white dark:bg-dark-card w-app-menu fixed top-0 left-0 bottom-0 -translate-x-full group-data-[sidebar-size=sm]:min-h-screen group-data-[sidebar-size=sm]:h-max border-r-2 border-primary-400 xl:border-none xl:translate-x-0 rounded-r-15 xl:rounded-15 xl:group-data-[sidebar-size=lg]:w-app-menu xl:group-data-[sidebar-size=sm]:w-app-menu-sm xl:group-data-[sidebar-size=sm]:absolute xl:group-data-[sidebar-size=lg]:fixed xl:top-4 xl:left-4 xl:group-data-[sidebar-size=lg]:bottom-4 xl:group-data-[theme-width=box]:left-auto dk-theme-card-square z-backdrop ac-transition" tabindex="-1">
    <div class="px-6 group-data-[sidebar-size=sm]:px-4 h-header flex items-center shrink-0 group-data-[sidebar-size=sm]:justify-center">
        <a href="{{ route('admin.dashboard') }}" class="group-data-[sidebar-size=lg]:block hidden">
            <img src="{{ asset('dashboard/assets/images/logo/logo-text.svg') }}" alt="logo" class="group-[.dark]:hidden">
            <img src="{{ asset('dashboard/assets/images/logo/logo-text-dark.svg') }}" alt="logo" class="group-[.light]:hidden">
        </a>
        <a href="{{ route('admin.dashboard') }}" class="group-data-[sidebar-size=lg]:hidden block">
            <img src="{{ asset('dashboard/assets/images/logo/logo-icon.svg') }}" alt="logo">
        </a>
    </div>
    <div id="app-menu-scrollbar" data-scrollbar class="px-2.5 group-data-[sidebar-size=sm]:px-0 group-data-[sidebar-size=sm]:!overflow-visible !overflow-x-hidden smooth-scrollbar">
        <div class="group-data-[sidebar-size=lg]:max-h-full">
            <ul id="navbar-nav" class="text-[14px] !leading-none space-y-1 group-data-[sidebar-size=sm]:space-y-2.5 group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:flex-col group-data-[sidebar-size=sm]:items-start group-data-[sidebar-size=sm]:mx-2 group-data-[sidebar-size=sm]:overflow-visible">
                <li class="relative group/sm w-full group-data-[sidebar-size=sm]:hover:w-[calc(theme('spacing.app-menu-sm')_*_3.4)] group-data-[sidebar-size=sm]:flex-center">
                    <a href="{{ route('admin.dashboard') }}" class=" {{ request()->routeIs('admin.dashboard') ? 'show active' : '' }} leading-none px-3.5 py-3 h-[42px] flex items-center rounded-md group-data-[sidebar-size=sm]:p-3 group-data-[sidebar-size=sm]:w-full text-gray-500 dark:text-dark-text-two hover:text-primary-500 dark:hover:text-white [&.active]:text-primary-500 dark:[&.active]:text-white group-data-[sidebar-size=sm]:border group-data-[sidebar-size=sm]:border-gray-200 dark:group-data-[sidebar-size=sm]:border-dark-border-four hover:!bg-primary-200 dark:hover:!bg-primary-500 [&.active]:bg-primary-200 dark:[&.active]:bg-primary-500 group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-card group-data-[sidebar-size=sm]:hover:bg-primary-500 group-data-[sidebar-size=sm]:[&.active]:bg-primary-200 dark:group-data-[sidebar-size=sm]:[&.active]:bg-primary-500 group/menu-link dk-theme-card-square ac-transition">
                        <span class="shrink-0 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_0.43)] group-data-[sidebar-size=sm]:flex-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15">
                                <path fill="currentColor" fill-rule="evenodd" d="M2.8 1h-.05c-.229 0-.426 0-.6.041A1.5 1.5 0 0 0 1.04 2.15c-.04.174-.04.37-.04.6v2.5c0 .229 0 .426.041.6A1.5 1.5 0 0 0 2.15 6.96c.174.04.37.04.6.04h2.5c.229 0 .426 0 .6-.041A1.5 1.5 0 0 0 6.96 5.85c.04-.174.04-.37.04-.6v-2.5c0-.229 0-.426-.041-.6A1.5 1.5 0 0 0 5.85 1.04C5.676 1 5.48 1 5.25 1H5.2zm-.417 1.014c.043-.01.11-.014.417-.014h2.4c.308 0 .374.003.417.014a.5.5 0 0 1 .37.37c.01.042.013.108.013.416v2.4c0 .308-.003.374-.014.417a.5.5 0 0 1-.37.37C5.575 5.996 5.509 6 5.2 6H2.8c-.308 0-.374-.003-.417-.014a.5.5 0 0 1-.37-.37C2.004 5.575 2 5.509 2 5.2V2.8c0-.308.003-.374.014-.417a.5.5 0 0 1 .37-.37M9.8 1h-.05c-.229 0-.426 0-.6.041A1.5 1.5 0 0 0 8.04 2.15c-.04.174-.04.37-.04.6v2.5c0 .229 0 .426.041.6A1.5 1.5 0 0 0 9.15 6.96c.174.04.37.04.6.04h2.5c.229 0 .426 0 .6-.041a1.5 1.5 0 0 0 1.11-1.109c.04-.174.04-.37.04-.6v-2.5c0-.229 0-.426-.041-.6a1.5 1.5 0 0 0-1.109-1.11c-.174-.04-.37-.04-.6-.04h-.05zm-.417 1.014c.043-.01.11-.014.417-.014h2.4c.308 0 .374.003.417.014a.5.5 0 0 1 .37.37c.01.042.013.108.013.416v2.4c0 .308-.004.374-.014.417a.5.5 0 0 1-.37.37c-.042.01-.108.013-.416.013H9.8c-.308 0-.374-.003-.417-.014a.5.5 0 0 1-.37-.37C9.004 5.575 9 5.509 9 5.2V2.8c0-.308.003-.374.014-.417a.5.5 0 0 1 .37-.37M2.75 8h2.5c.229 0 .426 0 .6.041A1.5 1.5 0 0 1 6.96 9.15c.04.174.04.37.04.6v2.5c0 .229 0 .426-.041.6a1.5 1.5 0 0 1-1.109 1.11c-.174.04-.37.04-.6.04h-2.5c-.229 0-.426 0-.6-.041a1.5 1.5 0 0 1-1.11-1.109c-.04-.174-.04-.37-.04-.6v-2.5c0-.229 0-.426.041-.6A1.5 1.5 0 0 1 2.15 8.04c.174-.04.37-.04.6-.04m.05 1c-.308 0-.374.003-.417.014a.5.5 0 0 0-.37.37C2.004 9.425 2 9.491 2 9.8v2.4c0 .308.003.374.014.417a.5.5 0 0 0 .37.37c.042.01.108.013.416.013h2.4c.308 0 .374-.004.417-.014a.5.5 0 0 0 .37-.37c.01-.042.013-.108.013-.416V9.8c0-.308-.003-.374-.014-.417a.5.5 0 0 0-.37-.37C5.575 9.004 5.509 9 5.2 9zm7-1h-.05c-.229 0-.426 0-.6.041A1.5 1.5 0 0 0 8.04 9.15c-.04.174-.04.37-.04.6v2.5c0 .229 0 .426.041.6a1.5 1.5 0 0 0 1.109 1.11c.174.041.371.041.6.041h2.5c.229 0 .426 0 .6-.041a1.5 1.5 0 0 0 1.109-1.109c.041-.174.041-.371.041-.6V9.75c0-.229 0-.426-.041-.6a1.5 1.5 0 0 0-1.109-1.11c-.174-.04-.37-.04-.6-.04h-.05zm-.417 1.014c.043-.01.11-.014.417-.014h2.4c.308 0 .374.003.417.014a.5.5 0 0 1 .37.37c.01.042.013.108.013.416v2.4c0 .308-.004.374-.014.417a.5.5 0 0 1-.37.37c-.042.01-.108.013-.416.013H9.8c-.308 0-.374-.004-.417-.014a.5.5 0 0 1-.37-.37C9.004 12.575 9 12.509 9 12.2V9.8c0-.308.003-.374.014-.417a.5.5 0 0 1 .37-.37" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:ml-6 group-data-[sidebar-size=sm]:group-hover/sm:block ml-3 shrink-0">
                            Dashboard
                        </span>
                    </a>
                </li>

                @if (Auth::user()->role_id == 1)
                <li class="relative group/sm w-full group-data-[sidebar-size=sm]:hover:w-[calc(theme('spacing.app-menu-sm')_*_3.4)] group-data-[sidebar-size=sm]:flex-center">
                    <a href="#" class=" {{ request()->routeIs('categories.index') || request()->routeIs('categories.create') ? 'show active' : '' }} dropdown-button top-layer relative leading-none px-3.5 py-3 h-[42px] flex items-center rounded-md group-data-[sidebar-size=sm]:p-3 group-data-[sidebar-size=sm]:w-full text-gray-500 dark:text-dark-text-two hover:text-primary-500 dark:hover:text-white [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-white group-data-[sidebar-size=sm]:border group-data-[sidebar-size=sm]:border-gray-200 dark:group-data-[sidebar-size=sm]:border-dark-border-four hover:!bg-primary-200 dark:hover:!bg-primary-500 [&amp;.active]:bg-primary-200 dark:[&amp;.active]:bg-primary-500 group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-card group-data-[sidebar-size=sm]:hover:bg-primary-500 group-data-[sidebar-size=sm]:[&amp;.active]:bg-primary-200 dark:group-data-[sidebar-size=sm]:[&amp;.active]:bg-primary-500 group/menu-link peer/dp-btn dk-theme-card-square ac-transition">
                        <span class="shrink-0 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_0.43)] group-data-[sidebar-size=sm]:flex-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                                <path fill="currentColor" d="M27 22.141V18a2 2 0 0 0-2-2h-8v-4h2a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2v4H7a2 2 0 0 0-2 2v4.142a4 4 0 1 0 2 0V18h8v4.142a4 4 0 1 0 2 0V18h8v4.141a4 4 0 1 0 2 0M13 4h6l.001 6H13ZM8 26a2 2 0 1 1-2-2a2 2 0 0 1 2 2m10 0a2 2 0 1 1-2-2a2.003 2.003 0 0 1 2 2m8 2a2 2 0 1 1 2-2a2 2 0 0 1-2 2"></path>
                            </svg>
                        </span>
                        <span class="group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:ml-6 group-data-[sidebar-size=sm]:group-hover/sm:block ml-3 shrink-0">
                            Course Category
                        </span>
                    </a>
                    <div class="dropdown-content max-h-0 group-data-[sidebar-size=sm]:!max-h-max overflow-hidden group-data-[sidebar-size=sm]:overflow-visible hidden group-data-[sidebar-size=lg]:block peer-[.show]/dp-btn:my-1.5 group-data-[sidebar-size=sm]:!my-0 group-data-[sidebar-size=lg]:w-[calc(theme('spacing.app-menu')_-_16px)] group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_2.5)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:left-[calc(theme('spacing.app-menu-sm')_*_0.9)] top-full group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-tooltip group-data-[sidebar-size=sm]:shadow-menu-dropdown transition-all duration-300" style="{{ request()->routeIs('categories.create') || request()->routeIs('categories.index') ? 'max-height: 71px;' : '' }}">
                        <ul class="text-[14px] pl-1.5 group-data-[sidebar-size=sm]:pl-0">
                            <li class="relative group/sub">
                                <a href="{{ route('categories.index') }}" class=" {{ request()->routeIs('categories.index') ? 'show active' : '' }} relative peer/link text-gray-500 dark:text-dark-text-two font-medium leading-none px-5 py-2.5 group-data-[sidebar-size=lg]:pl-8 flex hover:text-primary-500 dark:hover:text-dark-text [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-dark-text before:absolute before:top-[49%] before:-translate-y-1/2 before:left-4 before:size-1.5 before:rounded-50 before:border before:border-gray-400 hover:before:border-none hover:before:bg-primary-400 [&amp;.active]:before:border-none group-data-[sidebar-size=sm]:after:block group-data-[sidebar-size=sm]:after:right-3 [&amp;.active]:before:bg-primary-400 group-data-[sidebar-size=sm]:before:hidden">
                                    All Course Category
                                </a>
                            </li>
                            <li class="relative group/sub">
                                <a href="{{ route('categories.create') }}" class="{{ request()->routeIs('categories.create') ? 'show active' : '' }} relative peer/link text-gray-500 dark:text-dark-text-two font-medium leading-none px-5 py-2.5 group-data-[sidebar-size=lg]:pl-8 flex hover:text-primary-500 dark:hover:text-dark-text [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-dark-text before:absolute before:top-[49%] before:-translate-y-1/2 before:left-4 before:size-1.5 before:rounded-50 before:border before:border-gray-400 hover:before:border-none hover:before:bg-primary-400 [&amp;.active]:before:border-none group-data-[sidebar-size=sm]:after:block group-data-[sidebar-size=sm]:after:right-3 [&amp;.active]:before:bg-primary-400 group-data-[sidebar-size=sm]:before:hidden">
                                    Create Course Category
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->role_id == 1)
                <li class="relative group/sm w-full group-data-[sidebar-size=sm]:hover:w-[calc(theme('spacing.app-menu-sm')_*_3.4)] group-data-[sidebar-size=sm]:flex-center">
                    <a href="#" class=" {{ request()->routeIs('instructor.index') || request()->routeIs('instructor.create') ? 'show active' : '' }} dropdown-button top-layer relative leading-none px-3.5 py-3 h-[42px] flex items-center rounded-md group-data-[sidebar-size=sm]:p-3 group-data-[sidebar-size=sm]:w-full text-gray-500 dark:text-dark-text-two hover:text-primary-500 dark:hover:text-white [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-white group-data-[sidebar-size=sm]:border group-data-[sidebar-size=sm]:border-gray-200 dark:group-data-[sidebar-size=sm]:border-dark-border-four hover:!bg-primary-200 dark:hover:!bg-primary-500 [&amp;.active]:bg-primary-200 dark:[&amp;.active]:bg-primary-500 group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-card group-data-[sidebar-size=sm]:hover:bg-primary-500 group-data-[sidebar-size=sm]:[&amp;.active]:bg-primary-200 dark:group-data-[sidebar-size=sm]:[&amp;.active]:bg-primary-500 group/menu-link peer/dp-btn dk-theme-card-square ac-transition">
                        <span class="shrink-0 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_0.43)] group-data-[sidebar-size=sm]:flex-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M0 2.75C0 1.783.784 1 1.75 1h12.5c.967 0 1.75.783 1.75 1.75v9.5A1.75 1.75 0 0 1 14.25 14H8.061l-2.574 2.573A1.457 1.457 0 0 1 3 15.543V14H1.75A1.75 1.75 0 0 1 0 12.25Zm1.75-.25a.25.25 0 0 0-.25.25v9.5c0 .138.112.25.25.25h2a.75.75 0 0 1 .75.75v2.189l2.72-2.719a.75.75 0 0 1 .53-.22h6.5a.25.25 0 0 0 .25-.25v-9.5a.25.25 0 0 0-.25-.25Zm20.5 6h-3.5a.75.75 0 0 1 0-1.5h3.5c.966 0 1.75.784 1.75 1.75v9.5A1.75 1.75 0 0 1 22.25 20H21v1.543a1.457 1.457 0 0 1-2.487 1.03L15.939 20H10.75A1.75 1.75 0 0 1 9 18.25v-1.465a.75.75 0 0 1 1.5 0v1.465c0 .138.112.25.25.25h5.5c.199 0 .39.079.53.22l2.72 2.719V19.25a.75.75 0 0 1 .75-.75h2a.25.25 0 0 0 .25-.25v-9.5a.25.25 0 0 0-.25-.25m-9.72-3.22l-5 5a.747.747 0 0 1-1.06 0l-2.5-2.5a.749.749 0 1 1 1.06-1.06L7 8.689l4.47-4.469a.749.749 0 1 1 1.06 1.06"></path>
                            </svg>
                        </span>
                        <span class="group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:ml-6 group-data-[sidebar-size=sm]:group-hover/sm:block ml-3 shrink-0">
                            Manage Instructors
                        </span>
                    </a>
                    <div class="dropdown-content max-h-0 group-data-[sidebar-size=sm]:!max-h-max overflow-hidden group-data-[sidebar-size=sm]:overflow-visible hidden group-data-[sidebar-size=lg]:block peer-[.show]/dp-btn:my-1.5 group-data-[sidebar-size=sm]:!my-0 group-data-[sidebar-size=lg]:w-[calc(theme('spacing.app-menu')_-_16px)] group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_2.5)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:left-[calc(theme('spacing.app-menu-sm')_*_0.9)] top-full group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-tooltip group-data-[sidebar-size=sm]:shadow-menu-dropdown transition-all duration-300" style="{{ request()->routeIs('instructor.create') || request()->routeIs('instructor.index') ? 'max-height: 71px;' : '' }}">
                        <ul class="text-[14px] pl-1.5 group-data-[sidebar-size=sm]:pl-0">
                            <li class="relative group/sub">
                                <a href="{{ route('instructor.index') }}" class=" {{ request()->routeIs('instructor.index') ? 'show active' : '' }} relative peer/link text-gray-500 dark:text-dark-text-two font-medium leading-none px-5 py-2.5 group-data-[sidebar-size=lg]:pl-8 flex hover:text-primary-500 dark:hover:text-dark-text [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-dark-text before:absolute before:top-[49%] before:-translate-y-1/2 before:left-4 before:size-1.5 before:rounded-50 before:border before:border-gray-400 hover:before:border-none hover:before:bg-primary-400 [&amp;.active]:before:border-none group-data-[sidebar-size=sm]:after:block group-data-[sidebar-size=sm]:after:right-3 [&amp;.active]:before:bg-primary-400 group-data-[sidebar-size=sm]:before:hidden">
                                    Instructor List
                                </a>
                            </li>
                            <li class="relative group/sub">
                                <a href="{{ route('instructor.create') }}" class="{{ request()->routeIs('instructor.create') ? 'show active' : '' }} relative peer/link text-gray-500 dark:text-dark-text-two font-medium leading-none px-5 py-2.5 group-data-[sidebar-size=lg]:pl-8 flex hover:text-primary-500 dark:hover:text-dark-text [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-dark-text before:absolute before:top-[49%] before:-translate-y-1/2 before:left-4 before:size-1.5 before:rounded-50 before:border before:border-gray-400 hover:before:border-none hover:before:bg-primary-400 [&amp;.active]:before:border-none group-data-[sidebar-size=sm]:after:block group-data-[sidebar-size=sm]:after:right-3 [&amp;.active]:before:bg-primary-400 group-data-[sidebar-size=sm]:before:hidden">
                                    Create Instructor
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->role_id == 1)
                <li class="relative group/sm w-full group-data-[sidebar-size=sm]:hover:w-[calc(theme('spacing.app-menu-sm')_*_3.4)] group-data-[sidebar-size=sm]:flex-center">
                    <a href="#" class=" {{ request()->routeIs('course.index') || request()->routeIs('course.create') || request()->routeIs('course-label.index') ? 'show active' : '' }} dropdown-button top-layer relative leading-none px-3.5 py-3 h-[42px] flex items-center rounded-md group-data-[sidebar-size=sm]:p-3 group-data-[sidebar-size=sm]:w-full text-gray-500 dark:text-dark-text-two hover:text-primary-500 dark:hover:text-white [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-white group-data-[sidebar-size=sm]:border group-data-[sidebar-size=sm]:border-gray-200 dark:group-data-[sidebar-size=sm]:border-dark-border-four hover:!bg-primary-200 dark:hover:!bg-primary-500 [&amp;.active]:bg-primary-200 dark:[&amp;.active]:bg-primary-500 group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-card group-data-[sidebar-size=sm]:hover:bg-primary-500 group-data-[sidebar-size=sm]:[&amp;.active]:bg-primary-200 dark:group-data-[sidebar-size=sm]:[&amp;.active]:bg-primary-500 group/menu-link peer/dp-btn dk-theme-card-square ac-transition">
                        <span class="shrink-0 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_0.43)] group-data-[sidebar-size=sm]:flex-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 256 256">
                                <path fill="currentColor" d="m164.44 105.34l-48-32A8 8 0 0 0 104 80v64a8 8 0 0 0 12.44 6.66l48-32a8 8 0 0 0 0-13.32M120 129.05V95l25.58 17ZM216 40H40a16 16 0 0 0-16 16v112a16 16 0 0 0 16 16h176a16 16 0 0 0 16-16V56a16 16 0 0 0-16-16m0 128H40V56h176zm16 40a8 8 0 0 1-8 8H32a8 8 0 0 1 0-16h192a8 8 0 0 1 8 8"></path>
                            </svg>
                        </span>
                        <span class="group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:ml-6 group-data-[sidebar-size=sm]:group-hover/sm:block ml-3 shrink-0">
                            Course Manage
                        </span>
                    </a>
                    <div class="dropdown-content max-h-0 group-data-[sidebar-size=sm]:!max-h-max overflow-hidden group-data-[sidebar-size=sm]:overflow-visible hidden group-data-[sidebar-size=lg]:block peer-[.show]/dp-btn:my-1.5 group-data-[sidebar-size=sm]:!my-0 group-data-[sidebar-size=lg]:w-[calc(theme('spacing.app-menu')_-_16px)] group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_2.5)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:left-[calc(theme('spacing.app-menu-sm')_*_0.9)] top-full group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-tooltip group-data-[sidebar-size=sm]:shadow-menu-dropdown transition-all duration-300" style=" {{ request()->routeIs('course.index') || request()->routeIs('course.create') || request()->routeIs('course-label.index') ? 'max-height: 282px;' : '' }}">
                        <ul class="text-[14px] pl-1.5 group-data-[sidebar-size=sm]:pl-0">
                            <li class="relative group/sub">
                                <a href="{{ route('course-label.index') }}" class="{{ request()->routeIs('course-label.index') ? 'show active' : '' }}  relative peer/link text-gray-500 dark:text-dark-text-two font-medium leading-none px-5 py-2.5 group-data-[sidebar-size=lg]:pl-8 flex hover:text-primary-500 dark:hover:text-dark-text [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-dark-text before:absolute before:top-[49%] before:-translate-y-1/2 before:left-4 before:size-1.5 before:rounded-50 before:border before:border-gray-400 hover:before:border-none hover:before:bg-primary-400 [&amp;.active]:before:border-none group-data-[sidebar-size=sm]:after:block group-data-[sidebar-size=sm]:after:right-3 [&amp;.active]:before:bg-primary-400 group-data-[sidebar-size=sm]:before:hidden">
                                    Label
                                </a>
                            </li>
                            <li class="relative group/sub">
                                <a href="#" class=" {{ request()->routeIs('course.index') ? 'show active' : '' }} dropdown-button second-layer relative peer/dp-btn text-gray-500 dark:text-dark-text-two font-medium leading-none px-5 py-2.5 group-data-[sidebar-size=lg]:pl-8 flex hover:text-primary-500 dark:hover:text-dark-text [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-dark-text before:absolute before:top-[49%] before:-translate-y-1/2 before:left-4 before:size-1.5 before:rounded-50 before:border before:border-gray-400 hover:before:border-none hover:before:bg-primary-400 [&amp;.active]:before:border-none group-data-[sidebar-size=sm]:after:block group-data-[sidebar-size=sm]:after:right-3 [&amp;.active]:before:bg-primary-400 group-data-[sidebar-size=sm]:before:hidden">
                                    Course
                                </a>
                                <div class="dropdown-content max-h-0 overflow-hidden hidden group-data-[sidebar-size=sm]:!max-h-max group-data-[sidebar-size=sm]:overflow-visible group-data-[sidebar-size=lg]:block peer-[.show]/dp-btn:my-1.5 group-data-[sidebar-size=sm]:!my-0 group-data-[sidebar-size=lg]:w-full group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_2.5)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:-right-full top-0 group-data-[sidebar-size=sm]:group-hover/sub:block group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-tooltip group-data-[sidebar-size=sm]:shadow-menu-dropdown transition-all duration-300" style="{{ request()->routeIs('course.index') || request()->routeIs('course.create') ? 'max-height: 106px' : '' }}">
                                    <ul class="text-[14px] pl-3.5 group-data-[sidebar-size=sm]:pl-0">
                                        <li class="relative group/sub">
                                            <a href="{{ route('course.index') }}" class=" {{ request()->routeIs('course.index') ? 'show active' : '' }} relative peer/link text-gray-500 dark:text-dark-text-two font-medium leading-none px-5 py-2.5 group-data-[sidebar-size=lg]:pl-8 flex hover:text-primary-500 dark:hover:text-dark-text [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-dark-text before:absolute before:top-[49%] before:-translate-y-1/2 before:left-4 before:size-1.5 before:rounded-50 before:border before:border-gray-400 hover:before:border-none hover:before:bg-primary-400 [&amp;.active]:before:border-none group-data-[sidebar-size=sm]:after:block group-data-[sidebar-size=sm]:after:right-3 [&amp;.active]:before:bg-primary-400 group-data-[sidebar-size=sm]:before:hidden">
                                                All Course List
                                            </a>
                                        </li>
                                        <li class="relative group/sub">
                                            <a href="{{ route('course.create') }}" class=" {{ request()->routeIs('course.create') ? 'show active' : '' }} relative peer/link text-gray-500 dark:text-dark-text-two font-medium leading-none px-5 py-2.5 group-data-[sidebar-size=lg]:pl-8 flex hover:text-primary-500 dark:hover:text-dark-text [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-dark-text before:absolute before:top-[49%] before:-translate-y-1/2 before:left-4 before:size-1.5 before:rounded-50 before:border before:border-gray-400 hover:before:border-none hover:before:bg-primary-400 [&amp;.active]:before:border-none group-data-[sidebar-size=sm]:after:block group-data-[sidebar-size=sm]:after:right-3 [&amp;.active]:before:bg-primary-400 group-data-[sidebar-size=sm]:before:hidden">
                                                Create new Course
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->role_id == 3)
                <li class="relative group/sm w-full group-data-[sidebar-size=sm]:hover:w-[calc(theme('spacing.app-menu-sm')_*_3.4)] group-data-[sidebar-size=sm]:flex-center">
                    <a href="#" class=" {{ request()->routeIs('student.profile') ? 'show active' : '' }} dropdown-button top-layer relative leading-none px-3.5 py-3 h-[42px] flex items-center rounded-md group-data-[sidebar-size=sm]:p-3 group-data-[sidebar-size=sm]:w-full text-gray-500 dark:text-dark-text-two hover:text-primary-500 dark:hover:text-white [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-white group-data-[sidebar-size=sm]:border group-data-[sidebar-size=sm]:border-gray-200 dark:group-data-[sidebar-size=sm]:border-dark-border-four hover:!bg-primary-200 dark:hover:!bg-primary-500 [&amp;.active]:bg-primary-200 dark:[&amp;.active]:bg-primary-500 group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-card group-data-[sidebar-size=sm]:hover:bg-primary-500 group-data-[sidebar-size=sm]:[&amp;.active]:bg-primary-200 dark:group-data-[sidebar-size=sm]:[&amp;.active]:bg-primary-500 group/menu-link peer/dp-btn dk-theme-card-square ac-transition">
                        <span class="shrink-0 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_0.43)] group-data-[sidebar-size=sm]:flex-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                                <path fill="currentColor" d="M27 22.141V18a2 2 0 0 0-2-2h-8v-4h2a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2v4H7a2 2 0 0 0-2 2v4.142a4 4 0 1 0 2 0V18h8v4.142a4 4 0 1 0 2 0V18h8v4.141a4 4 0 1 0 2 0M13 4h6l.001 6H13ZM8 26a2 2 0 1 1-2-2a2 2 0 0 1 2 2m10 0a2 2 0 1 1-2-2a2.003 2.003 0 0 1 2 2m8 2a2 2 0 1 1 2-2a2 2 0 0 1-2 2"></path>
                            </svg>
                        </span>
                        <span class="group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:ml-6 group-data-[sidebar-size=sm]:group-hover/sm:block ml-3 shrink-0">
                            Manage Profile
                        </span>
                    </a>
                    <div class="dropdown-content max-h-0 group-data-[sidebar-size=sm]:!max-h-max overflow-hidden group-data-[sidebar-size=sm]:overflow-visible hidden group-data-[sidebar-size=lg]:block peer-[.show]/dp-btn:my-1.5 group-data-[sidebar-size=sm]:!my-0 group-data-[sidebar-size=lg]:w-[calc(theme('spacing.app-menu')_-_16px)] group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_2.5)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:left-[calc(theme('spacing.app-menu-sm')_*_0.9)] top-full group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-tooltip group-data-[sidebar-size=sm]:shadow-menu-dropdown transition-all duration-300" style="{{ request()->routeIs('student.profile') ? 'max-height: 71px;' : '' }}">
                        <ul class="text-[14px] pl-1.5 group-data-[sidebar-size=sm]:pl-0">
                            <li class="relative group/sub">
                                <a href="{{ route('student.profile') }}" class=" {{ request()->routeIs('student.profile') ? 'show active' : '' }} relative peer/link text-gray-500 dark:text-dark-text-two font-medium leading-none px-5 py-2.5 group-data-[sidebar-size=lg]:pl-8 flex hover:text-primary-500 dark:hover:text-dark-text [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-dark-text before:absolute before:top-[49%] before:-translate-y-1/2 before:left-4 before:size-1.5 before:rounded-50 before:border before:border-gray-400 hover:before:border-none hover:before:bg-primary-400 [&amp;.active]:before:border-none group-data-[sidebar-size=sm]:after:block group-data-[sidebar-size=sm]:after:right-3 [&amp;.active]:before:bg-primary-400 group-data-[sidebar-size=sm]:before:hidden">
                                    Student Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->role_id == 3)
                <li class="relative group/sm w-full group-data-[sidebar-size=sm]:hover:w-[calc(theme('spacing.app-menu-sm')_*_3.4)] group-data-[sidebar-size=sm]:flex-center">
                    <a href="#" class=" {{ request()->routeIs('student.mycourses') ? 'show active' : '' }} dropdown-button top-layer relative leading-none px-3.5 py-3 h-[42px] flex items-center rounded-md group-data-[sidebar-size=sm]:p-3 group-data-[sidebar-size=sm]:w-full text-gray-500 dark:text-dark-text-two hover:text-primary-500 dark:hover:text-white [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-white group-data-[sidebar-size=sm]:border group-data-[sidebar-size=sm]:border-gray-200 dark:group-data-[sidebar-size=sm]:border-dark-border-four hover:!bg-primary-200 dark:hover:!bg-primary-500 [&amp;.active]:bg-primary-200 dark:[&amp;.active]:bg-primary-500 group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-card group-data-[sidebar-size=sm]:hover:bg-primary-500 group-data-[sidebar-size=sm]:[&amp;.active]:bg-primary-200 dark:group-data-[sidebar-size=sm]:[&amp;.active]:bg-primary-500 group/menu-link peer/dp-btn dk-theme-card-square ac-transition">
                        <span class="shrink-0 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_0.43)] group-data-[sidebar-size=sm]:flex-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                                <path fill="currentColor" d="M27 22.141V18a2 2 0 0 0-2-2h-8v-4h2a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2v4H7a2 2 0 0 0-2 2v4.142a4 4 0 1 0 2 0V18h8v4.142a4 4 0 1 0 2 0V18h8v4.141a4 4 0 1 0 2 0M13 4h6l.001 6H13ZM8 26a2 2 0 1 1-2-2a2 2 0 0 1 2 2m10 0a2 2 0 1 1-2-2a2.003 2.003 0 0 1 2 2m8 2a2 2 0 1 1 2-2a2 2 0 0 1-2 2"></path>
                            </svg>
                        </span>
                        <span class="group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:ml-6 group-data-[sidebar-size=sm]:group-hover/sm:block ml-3 shrink-0">
                            Subcription
                        </span>
                    </a>
                    <div class="dropdown-content max-h-0 group-data-[sidebar-size=sm]:!max-h-max overflow-hidden group-data-[sidebar-size=sm]:overflow-visible hidden group-data-[sidebar-size=lg]:block peer-[.show]/dp-btn:my-1.5 group-data-[sidebar-size=sm]:!my-0 group-data-[sidebar-size=lg]:w-[calc(theme('spacing.app-menu')_-_16px)] group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_2.5)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:left-[calc(theme('spacing.app-menu-sm')_*_0.9)] top-full group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-tooltip group-data-[sidebar-size=sm]:shadow-menu-dropdown transition-all duration-300" style="{{ request()->routeIs('student.mycourses') ? 'max-height: 71px;' : '' }}">
                        <ul class="text-[14px] pl-1.5 group-data-[sidebar-size=sm]:pl-0">
                            <li class="relative group/sub">
                                <a href="{{ route('student.mycourses') }}" class=" {{ request()->routeIs('student.mycourses') ? 'show active' : '' }} relative peer/link text-gray-500 dark:text-dark-text-two font-medium leading-none px-5 py-2.5 group-data-[sidebar-size=lg]:pl-8 flex hover:text-primary-500 dark:hover:text-dark-text [&amp;.active]:text-primary-500 dark:[&amp;.active]:text-dark-text before:absolute before:top-[49%] before:-translate-y-1/2 before:left-4 before:size-1.5 before:rounded-50 before:border before:border-gray-400 hover:before:border-none hover:before:bg-primary-400 [&amp;.active]:before:border-none group-data-[sidebar-size=sm]:after:block group-data-[sidebar-size=sm]:after:right-3 [&amp;.active]:before:bg-primary-400 group-data-[sidebar-size=sm]:before:hidden">
                                    My Courses
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->role_id == 1)
                <li class="relative group/sm w-full group-data-[sidebar-size=sm]:hover:w-[calc(theme('spacing.app-menu-sm')_*_3.4)] group-data-[sidebar-size=sm]:flex-center">
                    <a href="{{ route('admin.list-instructors') }}" class=" {{ request()->routeIs('admin.list-instructors') ? 'show active' : '' }} leading-none px-3.5 py-3 h-[42px] flex items-center rounded-md group-data-[sidebar-size=sm]:p-3 group-data-[sidebar-size=sm]:w-full text-gray-500 dark:text-dark-text-two hover:text-primary-500 dark:hover:text-white [&.active]:text-primary-500 dark:[&.active]:text-white group-data-[sidebar-size=sm]:border group-data-[sidebar-size=sm]:border-gray-200 dark:group-data-[sidebar-size=sm]:border-dark-border-four hover:!bg-primary-200 dark:hover:!bg-primary-500 [&.active]:bg-primary-200 dark:[&.active]:bg-primary-500 group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-card group-data-[sidebar-size=sm]:hover:bg-primary-500 group-data-[sidebar-size=sm]:[&.active]:bg-primary-200 dark:group-data-[sidebar-size=sm]:[&.active]:bg-primary-500 group/menu-link dk-theme-card-square ac-transition">
                        <span class="shrink-0 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_0.43)] group-data-[sidebar-size=sm]:flex-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M320 24H16v304h176v168h304V192H320ZM148.305 96L98.093 239.3H132l8.166-23.3H192v80H48V56h240v136h-66.668L187.7 96Zm36.317 88h-33.244L168 136.562ZM464 224v240H224V224Z" />
                                <path fill="currentColor" d="M317.432 368.48a137 137 0 0 0 10.089 14.12q-17.4 9.384-39.521 9.4v32c24.141 0 45.71-6.408 64-18.824C370.29 417.592 391.859 424 416 424v-32q-22.075 0-39.52-9.407a137 137 0 0 0 10.088-14.113A166.2 166.2 0 0 0 406.662 320H424v-32h-56v-24h-32v24h-56v32h17.338a166.2 166.2 0 0 0 20.094 48.48M373.53 320a133 133 0 0 1-14.1 31.52a104 104 0 0 1-7.43 10.448a104 104 0 0 1-6.93-9.651A132.4 132.4 0 0 1 330.466 320Z" />
                            </svg>
                        </span>
                        <span class="group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:ml-6 group-data-[sidebar-size=sm]:group-hover/sm:block ml-3 shrink-0">
                            All Instructors
                        </span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role_id == 1)
                <li class="relative group/sm w-full group-data-[sidebar-size=sm]:hover:w-[calc(theme('spacing.app-menu-sm')_*_3.4)] group-data-[sidebar-size=sm]:flex-center">
                    <a href="{{ route('admin.list-students') }}" class=" {{ request()->routeIs('admin.list-students') ? 'show active' : '' }} leading-none px-3.5 py-3 h-[42px] flex items-center rounded-md group-data-[sidebar-size=sm]:p-3 group-data-[sidebar-size=sm]:w-full text-gray-500 dark:text-dark-text-two hover:text-primary-500 dark:hover:text-white [&.active]:text-primary-500 dark:[&.active]:text-white group-data-[sidebar-size=sm]:border group-data-[sidebar-size=sm]:border-gray-200 dark:group-data-[sidebar-size=sm]:border-dark-border-four hover:!bg-primary-200 dark:hover:!bg-primary-500 [&.active]:bg-primary-200 dark:[&.active]:bg-primary-500 group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-card group-data-[sidebar-size=sm]:hover:bg-primary-500 group-data-[sidebar-size=sm]:[&.active]:bg-primary-200 dark:group-data-[sidebar-size=sm]:[&.active]:bg-primary-500 group/menu-link dk-theme-card-square ac-transition">
                        <span class="shrink-0 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_0.43)] group-data-[sidebar-size=sm]:flex-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M320 24H16v304h176v168h304V192H320ZM148.305 96L98.093 239.3H132l8.166-23.3H192v80H48V56h240v136h-66.668L187.7 96Zm36.317 88h-33.244L168 136.562ZM464 224v240H224V224Z" />
                                <path fill="currentColor" d="M317.432 368.48a137 137 0 0 0 10.089 14.12q-17.4 9.384-39.521 9.4v32c24.141 0 45.71-6.408 64-18.824C370.29 417.592 391.859 424 416 424v-32q-22.075 0-39.52-9.407a137 137 0 0 0 10.088-14.113A166.2 166.2 0 0 0 406.662 320H424v-32h-56v-24h-32v24h-56v32h17.338a166.2 166.2 0 0 0 20.094 48.48M373.53 320a133 133 0 0 1-14.1 31.52a104 104 0 0 1-7.43 10.448a104 104 0 0 1-6.93-9.651A132.4 132.4 0 0 1 330.466 320Z" />
                            </svg>
                        </span>
                        <span class="group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:ml-6 group-data-[sidebar-size=sm]:group-hover/sm:block ml-3 shrink-0">
                            All Students
                        </span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role_id == 1)
                <li class="relative group/sm w-full group-data-[sidebar-size=sm]:hover:w-[calc(theme('spacing.app-menu-sm')_*_3.4)] group-data-[sidebar-size=sm]:flex-center">
                    <a href="{{ route('admin.manage-subscriptions') }}" class=" {{ request()->routeIs('admin.manage-subscriptions') ? 'show active' : '' }} leading-none px-3.5 py-3 h-[42px] flex items-center rounded-md group-data-[sidebar-size=sm]:p-3 group-data-[sidebar-size=sm]:w-full text-gray-500 dark:text-dark-text-two hover:text-primary-500 dark:hover:text-white [&.active]:text-primary-500 dark:[&.active]:text-white group-data-[sidebar-size=sm]:border group-data-[sidebar-size=sm]:border-gray-200 dark:group-data-[sidebar-size=sm]:border-dark-border-four hover:!bg-primary-200 dark:hover:!bg-primary-500 [&.active]:bg-primary-200 dark:[&.active]:bg-primary-500 group-data-[sidebar-size=sm]:bg-white dark:group-data-[sidebar-size=sm]:bg-dark-card group-data-[sidebar-size=sm]:hover:bg-primary-500 group-data-[sidebar-size=sm]:[&.active]:bg-primary-200 dark:group-data-[sidebar-size=sm]:[&.active]:bg-primary-500 group/menu-link dk-theme-card-square ac-transition">
                        <span class="shrink-0 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.app-menu-sm')_*_0.43)] group-data-[sidebar-size=sm]:flex-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M320 24H16v304h176v168h304V192H320ZM148.305 96L98.093 239.3H132l8.166-23.3H192v80H48V56h240v136h-66.668L187.7 96Zm36.317 88h-33.244L168 136.562ZM464 224v240H224V224Z" />
                                <path fill="currentColor" d="M317.432 368.48a137 137 0 0 0 10.089 14.12q-17.4 9.384-39.521 9.4v32c24.141 0 45.71-6.408 64-18.824C370.29 417.592 391.859 424 416 424v-32q-22.075 0-39.52-9.407a137 137 0 0 0 10.088-14.113A166.2 166.2 0 0 0 406.662 320H424v-32h-56v-24h-32v24h-56v32h17.338a166.2 166.2 0 0 0 20.094 48.48M373.53 320a133 133 0 0 1-14.1 31.52a104 104 0 0 1-7.43 10.448a104 104 0 0 1-6.93-9.651A132.4 132.4 0 0 1 330.466 320Z" />
                            </svg>
                        </span>
                        <span class="group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:ml-6 group-data-[sidebar-size=sm]:group-hover/sm:block ml-3 shrink-0">
                            View Subscriptions
                        </span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- Logout Link -->
    <div class="mt-auto px-2.5 py-6 group-data-[sidebar-size=sm]:px-2">
        <a href="{{ route('logout') }}" class="flex-center-between text-gray-500 font-semibold leading-none bg-gray-200 dark:bg-dark-icon dark:text-dark-text rounded-[10px] px-6 py-4 group-data-[sidebar-size=sm]:p-[12px_8px] group-data-[sidebar-size=sm]:justify-center dk-theme-card-square">
            <span class="group-data-[sidebar-size=sm]:hidden block">Logout</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path fill="currentColor" d="M5 5h7V3H3v18h9v-2H5z" />
                <path fill="currentColor" d="m21 12l-4-4v3H9v2h8v3z" />
            </svg>
        </a>
    </div>
</div>
