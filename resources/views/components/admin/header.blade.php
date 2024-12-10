<header class="header px-4 sm:px-6 h-[calc(theme('spacing.header')_-_10px)] sm:h-header bg-white dark:bg-dark-card rounded-none xl:rounded-15 flex items-center mb-4 xl:m-4 group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_32px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_32px)] group-data-[sidebar-size=sm]:group-data-[theme-width=box]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[theme-width=box]:xl:mr-0 dk-theme-card-square ac-transition">
    <div class="flex-center-between grow">
        <!-- Header Left -->
        <div class="menu-hamburger-container flex-center">
            <button type="button" id="app-menu-hamburger" class="menu-hamburger hidden xl:block dk-theme-card-square"></button>
            <button type="button" class="menu-hamburger block xl:hidden dk-theme-card-square" data-drawer-target="app-drawer" data-drawer-show="app-drawer" aria-controls="app-drawer"></button>
        </div>
        <!-- Header Right -->
        <div class="flex items-center gap-5 md:gap-3">
            <!-- User Profile Button -->
            <div class="relative">
                <button type="button" data-popover-target="dropdownProfile" data-popover-trigger="click" data-popover-placement="bottom-end" class="flex items-center">
                    <img src="{{ Auth::user()->student && Auth::user()->student->image ? asset('uploads/students/' . Auth::user()->student->image) : asset('dashboard/assets/images/user/profile-img.png') }}"
                    alt="user-img"
                    class="size-9 rounded-50 dk-theme-card-square">
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownProfile" class="invisible z-backdrop bg-white text-left divide-y divide-gray-100 rounded-lg shadow w-48 dark:bg-dark-card-shade dark:divide-dark-border-four dk-theme-card-square">
                    <div class="px-4 py-3 text-sm text-gray-500 dark:text-white">
                        <div class="card-title text-lg">{{ Auth::user()->name }}</div>
                    </div>
                    @if (Auth::user()->role_id == 3)
                    <div class="py-2">
                        <a href="{{ route('student.profile') }}" class="flex font-medium px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-dark-icon dark:text-gray-200 dark:hover:text-white">Setting</a>
                    </div>
                    @endif
                    <div class="py-2">
                        <a href="{{ route('logout') }}" class="flex font-medium px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-dark-icon dark:text-gray-200 dark:hover:text-white">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
