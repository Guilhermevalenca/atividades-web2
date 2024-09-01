<nav x-data="{ open: false }" class="tw-bg-white tw-dark:tw-bg-gray-800 tw-border-b tw-border-gray-100 tw-dark:tw-border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="tw-max-w-7xl tw-mx-auto tw-px-4 tw-sm:tw-px-6 tw-lg:tw-px-8">
        <div class="tw-flex tw-justify-between tw-h-16">
            <div class="tw-flex">
                <!-- Logo -->
                <div class="tw-shrink-0 tw-flex tw-items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="tw-block tw-h-9 tw-w-auto tw-fill-current tw-text-gray-800 tw-dark:tw-text-gray-200" />
                    </a>
                    <!-- Navigation Links -->
                    <div class="tw-space-x-8 tw-sm:tw--my-px tw-sm:tw-ms-10 tw-sm:tw-flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')">
                            {{ __('Books') }}
                        </x-nav-link>
                        <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                            {{ __('Categories') }}
                        </x-nav-link>
                        <x-nav-link :href="route('publishers.index')" :active="request()->routeIs('publishers.*')">
                            {{ __('Publihers') }}
                        </x-nav-link>
                        <x-nav-link :href="route('authors.index')" :active="request()->routeIs('authors.*')">
                            {{ __('Authors') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
            <!-- Settings Dropdown -->
            <div class="tw-shrink-0 tw-flex tw-items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="tw-inline-flex tw-items-center tw-px-3 tw-py-2 tw-border tw-border-transparent tw-text-sm tw-leading-4 tw-font-medium tw-rounded-md tw-text-gray-500 tw-dark:tw-text-gray-400 tw-bg-white tw-dark:tw-bg-gray-800 tw-hover:tw-text-gray-700 tw-dark:tw-hover:tw-text-gray-300 tw-focus:tw-outline-none tw-transition tw-ease-in-out tw-duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="tw-ms-1">
                                <svg class="tw-fill-current tw-h-4 tw-w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
