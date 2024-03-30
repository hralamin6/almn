<div>
    <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 transition-opacity lg:hidden">    </div>

    <aside :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 h-screen flex-shrink-0 w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">

            <div class="flex flex-col h-full">
                <!-- Sidebar links -->
                <nav @click="sidebarOpen = false" aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto capitalize">
                    <!-- Dashboards links -->
                    @php
                        if (!is_null(request()->route())) {
                        $pageName = request()->route()->getName();
                        $routePrefix = explode('.', $pageName)[0] ?? '';
                        }
                    @endphp

                    <a href="{{route('home')}}" wire:navigate class="{{Route::is('home')?'bg-primary-100 dark:bg-primary':''}} flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                        <span aria-hidden="true"><x-h-o-home class="w-5 h-5"/></span>
                        <span class="ml-2 text-sm"> @lang('home') </span>
                    </a>
                    @auth
                        @can('isAdmin')
                            <div @if($routePrefix == "admin") x-data="{ isActive: true, open: true}" @else x-data="{ isActive: false, open: false}" @endif>                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a
                                    href="#"
                                    @click="$event.preventDefault(); open = !open"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                                    role="button"
                                    aria-haspopup="true"
                                    :aria-expanded="(open || isActive) ? 'true' : 'false'"
                                >
                  <span aria-hidden="true"><x-h-c-presentation-chart-bar/>
                  </span>
                                    <span class="ml-2 text-sm"> Dashboards </span>
                                    <span class="ml-auto" aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg
                        class="w-4 h-4 transition-transform transform"
                        :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </span>
                                </a>
                                <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                    <a
                                        href="{{route('admin.users')}}" wire:navigate role="menuitem"
                                        class="block p-2 text-sm {{Route::is('admin.users')?'text-gray-700 dark:text-light':'text-gray-400'}} transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                    >
                                        @lang('users')
                                    </a>
                                    <a
                                        href="{{route('admin.categories')}}" wire:navigate role="menuitem"
                                        class="block p-2 text-sm {{Route::is('admin.categories')?'text-gray-700 dark:text-light':'text-gray-400'}} transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                    >
                                        @lang('categories')
                                    </a>
                                </div>
                            </div>
                        @endcan

                        <a href="{{route('logout')}}" wire:navigate class="{{Route::is('login')?'bg-primary-100 dark:bg-primary':''}} flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                            <span aria-hidden="true"><x-h-o-arrow-left-start-on-rectangle class="w-5 h-5"/></span>
                            <span class="ml-2 text-sm"> @lang('logout') </span>
                        </a>
                    @endauth

                    @guest

                        <a href="{{route('login')}}" wire:navigate class="{{Route::is('login')?'bg-primary-100 dark:bg-primary':''}} flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                            <span aria-hidden="true"><x-h-o-arrow-right-start-on-rectangle class="w-5 h-5"/></span>
                            <span class="ml-2 text-sm"> @lang('login') </span>
                        </a>
                        <a href="{{route('register')}}" wire:navigate class="{{Route::is('register')?'bg-primary-100 dark:bg-primary':''}} flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                            <span aria-hidden="true"><x-h-o-user-plus class="w-5 h-5"/></span>
                            <span class="ml-2 text-sm"> @lang('register') </span>
                        </a>
                    @endguest

                </nav>

                <!-- Sidebar footer -->
                <div class="flex-shrink-0 px-2 py-4 space-y-2">
                    <button
                        @click="openSettingsPanel"
                        type="button"
                        class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark"
                    >
                <span aria-hidden="true">
                  <svg
                      class="w-4 h-4 mr-2"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                    />
                  </svg>
                </span>
                        <span>Customize</span>
                    </button>
                </div>
            </div>
        </aside>


</div>
