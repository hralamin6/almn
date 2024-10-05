<header class="relative bg-white dark:bg-darker">
    <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
        <!-- Mobile menu button -->
        <button
            @click="sidebarOpen = !sidebarOpen"
            class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring"
        >
            <span class="sr-only">Open main manu</span>
            <span aria-hidden="true">
                  <svg
                      class="w-8 h-8"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
                </span>
        </button>

        <!-- Brand -->
        <a
            href="{{route('home')}}" wire:navigate
            class="inline-block text-2xl font-bold tracking-wider uppercase bg-gradient-to-r from-red-500 to-green-500 px-2 py-1 rounded-lg text-light"
        >
            ARA-VOC
        </a>

        <!-- Mobile sub menu button -->
        <button
            @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
            class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring"
        >
            <span class="sr-only">Open sub manu</span>
            <span aria-hidden="true">
                  <svg
                      class="w-8 h-8"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                    />
                  </svg>
                </span>
        </button>

        <!-- Desktop Right buttons -->
        <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
            <!-- Toggle dark theme button -->
            <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                <div
                    class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter"
                ></div>
                <div
                    class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm"
                    :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }"
                >
                    <svg
                        x-show="!isDark"
                        class="w-4 h-4"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                        />
                    </svg>
                    <svg
                        x-show="isDark"
                        class="w-4 h-4"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                        />
                    </svg>
                </div>
            </button>



            <!-- Settings button -->
            <button
                @click="openSettingsPanel"
                class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
            >
                <span class="sr-only">Open settings panel</span>
                <svg
                    class="w-7 h-7"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                </svg>
            </button>
            <div class="relative inline-block text-left" x-data="{lang:false}">
                <div>
                    <span class="rounded-full shadow-sm">

                        <button @click="lang=!lang" @click.stop type="button"
                                class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                    <span class="sr-only">Open settings panel</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" /></svg>
                </button>
                    </span>
                </div>
                <div x-cloak x-show="lang" @click.outside="lang=false" @click="lang=false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-xl shadow-lg">
                    <div class="rounded-md bg-white dark:bg-dark shadow-xs">
                        <div class="py-1">
                            <a wire:click="$set('locale', 'bn')" class="block px-4 py-2 text-sm leading-5 text-gray-700 dark:text-gray-300 {{session()->get('locale')=='bn'?'bg-gray-300 dark:dark:bg-darker':''}} hover:dark:bg-gray-500 hover:bg-gray-300 focus:outline-none focus:bg-gray-300 transition duration-150 ease-in-out">@lang('bangla')</a>
                            <a wire:click="$set('locale', 'en')" class="block px-4 py-2 text-sm leading-5 text-gray-700 dark:text-gray-300 {{session()->get('locale')=='en'?'bg-gray-300 dark:dark:bg-darker':''}} hover:dark:bg-gray-500 hover:bg-gray-300 focus:outline-none focus:bg-gray-300 transition duration-150 ease-in-out">@lang('english')</a>
                            <a wire:click="$set('locale', 'ar')" class="block px-4 py-2 text-sm leading-5 text-gray-700 dark:text-gray-300 {{session()->get('locale')=='ar'?'bg-gray-300 dark:dark:bg-darker':''}} hover:dark:bg-gray-500 hover:bg-gray-300 focus:outline-none focus:bg-gray-300 transition duration-150 ease-in-out">@lang('arabic')</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User avatar button -->
            <div class="relative" x-data="{ open: false }">
                @auth
                    <button
                        @click="open = !open"
                        type="button"
                        aria-haspopup="true"
                        :aria-expanded="open ? 'true' : 'false'"
                        class="p-0.5 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                        <span class="sr-only">User menu</span>
                        <img class="w-10 h-10 rounded-full" src="{{auth()->user()->getFirstMediaUrl('default')}}" alt="" />

                    </button>
                @else
                    <button
                        type="button"
                        aria-haspopup="true"
                        class="p-0.5 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                        <span class="sr-only">User menu</span>
                        <a href="{{ route('socialite.auth', 'google') }}">
                            <i class='bx bx-user-circle text-primary bx-tada w-10 h-10 rounded-full text-4xl' ></i>
                        </a>
                    </button>
                @endauth

                <!-- User dropdown menu -->
                    @auth
                <div
                    x-show="open"
                    x-ref="userMenu"
                    x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0"
                    @click.away="open = false"
                    @keydown.escape="open = false"
                    class="absolute capitalize right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                    tabindex="-1"
                    role="menu"
                    aria-orientation="vertical"
                    aria-label="User menu"
                >
                    <a href="{{route('wishlists')}}" wire:navigate role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                    >@lang('wishllists')</a>
                    <a href="{{route('quizzes')}}" wire:navigate role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                    >@lang('previous exams')</a>
                    <a
                        href="{{route('logout')}}" wire:navigate
                        role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                    >
                        @lang('logout')
                    </a>
                </div>
                    @endauth
            </div>
        </nav>

        <!-- Mobile sub menu -->
        <nav
            x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
            x-transition:enter-start="-translate-y-full opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:leave-start="translate-y-0 opacity-100"
            x-transition:leave-end="-translate-y-full opacity-0"
            x-show="isMobileSubMenuOpen"
{{--            @click.away="isMobileSubMenuOpen = false"--}}
            class="absolute flex items-center p-4 justify-center bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden z-50"
            aria-label="Secondary"
        >
            <div class="space-x-2">
                <!-- Toggle dark theme button -->
                <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                    <div
                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter"
                    ></div>
                    <div
                        class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm"
                        :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }"
                    >
                        <svg
                            x-show="!isDark"
                            class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                            />
                        </svg>
                        <svg
                            x-show="isDark"
                            class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                            />
                        </svg>
                    </div>
                </button>


                <!-- Settings button -->
                <button
                    @click="openSettingsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                >
                    <span class="sr-only">Open settings panel</span>
                    <svg
                        class="w-7 h-7"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                    </svg>
                </button>

                <div class="relative inline-block z-50 text-left" x-data="{lang:false}">
                    <div>
                    <span class="rounded-full shadow-sm">

                        <button @click="lang=!lang" @click.stop type="button"
                                class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                    <span class="sr-only">Open settings panel</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" /></svg>
                </button>
                    </span>
                    </div>
                    <div x-cloak x-show="lang" @click.outside="lang=false" @click="lang=false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-xl shadow-lg">
                        <div class="rounded-md bg-white dark:bg-dark shadow-xs">
                            <div class="py-1">
                                <a wire:click="$set('locale', 'bn')" class="block px-4 py-2 text-sm leading-5 text-gray-700 dark:text-gray-300 {{session()->get('locale')=='bn'?'bg-gray-300 dark:dark:bg-darker':''}} hover:dark:bg-gray-500 hover:bg-gray-300 focus:outline-none focus:bg-gray-300 transition duration-150 ease-in-out">@lang('bangla')</a>
                                <a wire:click="$set('locale', 'en')" class="block px-4 py-2 text-sm leading-5 text-gray-700 dark:text-gray-300 {{session()->get('locale')=='en'?'bg-gray-300 dark:dark:bg-darker':''}} hover:dark:bg-gray-500 hover:bg-gray-300 focus:outline-none focus:bg-gray-300 transition duration-150 ease-in-out">@lang('english')</a>
                                <a wire:click="$set('locale', 'ar')" class="block px-4 py-2 text-sm leading-5 text-gray-700 dark:text-gray-300 {{session()->get('locale')=='ar'?'bg-gray-300 dark:dark:bg-darker':''}} hover:dark:bg-gray-500 hover:bg-gray-300 focus:outline-none focus:bg-gray-300 transition duration-150 ease-in-out">@lang('arabic')</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="relative ml-auto" x-data="{ open: false }">
                @auth
                    <button
                        @click="open = !open"
                        type="button"
                        aria-haspopup="true"
                        :aria-expanded="open ? 'true' : 'false'"
                        class="p-0.5 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                        <span class="sr-only">User menu</span>
                        <img class="w-10 h-10 rounded-full" src="{{auth()->user()->getFirstMediaUrl('default')}}" alt="" />

                    </button>
                @else
                    <button
                        type="button"
                        aria-haspopup="true"
                        class="p-0.5 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                        <span class="sr-only">User menu</span>
                        <a href="{{ route('socialite.auth', 'google') }}">
                            <i class='bx bx-user-circle text-primary bx-tada w-10 h-10 rounded-full text-4xl' ></i>
                        </a>
                    </button>
                @endauth

                <!-- User dropdown menu -->
                @auth
                    <div
                        x-show="open"
                        x-transition:enter="transition-all transform ease-out"
                        x-transition:enter-start="translate-y-1/2 opacity-0"
                        x-transition:enter-end="translate-y-0 opacity-100"
                        x-transition:leave="transition-all transform ease-in"
                        x-transition:leave-start="translate-y-0 opacity-100"
                        x-transition:leave-end="translate-y-1/2 opacity-0"
                        @click.away="open = false"
                        class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark"
                        role="menu"
                        aria-orientation="vertical"
                        aria-label="User menu"
                    >
                        <a href="{{route('wishlists')}}" wire:navigate role="menuitem"
                           class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                        >@lang('wishllists')</a>
                        <a href="{{route('quizzes')}}" wire:navigate role="menuitem"
                           class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                        >@lang('previous exams')</a>
                        <a
                            href="{{route('logout')}}" wire:navigate
                            role="menuitem"
                            class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                        >
                            @lang('logout')
                        </a>

                    </div>
                @endauth
            </div>


        </nav>
    </div>
</header>
