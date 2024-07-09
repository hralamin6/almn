<div>
    <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 transition-opacity lg:hidden">    </div>

    <aside :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 h-screen flex-shrink-0 w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">

            <div class="flex flex-col h-full">
                <!-- Sidebar links -->
                <nav @click="sidebarOpen = false" aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto capitalize">
                    <!-- Dashboards links -->
                    <?php
                        if (!is_null(request()->route())) {
                        $pageName = request()->route()->getName();
                        $routePrefix = explode('.', $pageName)[0] ?? '';
                        }
                    ?>

                    <a href="<?php echo e(route('home')); ?>" wire:navigate class="<?php echo e(Route::is('home')?'bg-primary-100 dark:bg-primary':''); ?> flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                        <span aria-hidden="true"><i class='bx bx-home-alt bx-tada' ></i></span>
                        <span class="ml-2 "> <?php echo app('translator')->get('home'); ?> </span>
                    </a>
                    <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('my-words')); ?>" wire:navigate class="<?php echo e(Route::is('my-words')?'bg-primary-100 dark:bg-primary':''); ?> flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                        <span aria-hidden="true"><i class='bx bxl-wordpress bx-flashing' ></i></span>
                        <span class="ml-2 "> <?php echo app('translator')->get('my-words'); ?> </span>
                    </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <a href="<?php echo e(route('words')); ?>" wire:navigate class="<?php echo e(Route::is('words')?'bg-primary-100 dark:bg-primary':''); ?> flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                        <span aria-hidden="true"><i class='bx bxl-wordpress bx-flashing' ></i></span>
                        <span class="ml-2 "> <?php echo app('translator')->get('words'); ?> </span>
                    </a>
                    <a href="<?php echo e(route('practise')); ?>" wire:navigate class="<?php echo e(Route::is('practise')?'bg-primary-100 dark:bg-primary':''); ?> flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                        <span aria-hidden="true"><i class='bx bxl-meta bx-burst' ></i></span>
                        <span class="ml-2 "> <?php echo app('translator')->get('practise'); ?> </span>
                    </a>
                    <a href="<?php echo e(route('exam')); ?>" wire:navigate class="<?php echo e(Route::is('exam')?'bg-primary-100 dark:bg-primary':''); ?> flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                        <span aria-hidden="true"><i class='bx bxl-kubernetes bx-burst' ></i></span>
                        <span class="ml-2 "> <?php echo app('translator')->get('exam'); ?> </span>
                    </a>
                    <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>

                        <a href="<?php echo e(route('wishlists')); ?>" wire:navigate class="<?php echo e(Route::is('wishlists')?'bg-primary-100 dark:bg-primary':''); ?> flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                            <span aria-hidden="true"><i class='bx bxs-calendar-heart bx-tada' ></i></span>
                            <span class="ml-2 "> <?php echo app('translator')->get('wishlists'); ?> </span>
                        </a>
                        <a href="<?php echo e(route('quizzes')); ?>" wire:navigate class="<?php echo e(Route::is('quizzes')?'bg-primary-100 dark:bg-primary':''); ?> flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                            <span aria-hidden="true"><i class='bx bx-book bx-burst' ></i></span>
                            <span class="ml-2 "> <?php echo app('translator')->get('previous exams'); ?> </span>
                        </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if(auth()->guard('admin')->check()): ?>

                            <div <?php if($routePrefix == "dashboard"): ?> x-data="{ isActive: true, open: true}" <?php else: ?> x-data="{ isActive: false, open: false}" <?php endif; ?>>                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a
                                    href="#"
                                    @click="$event.preventDefault(); open = !open"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                                    role="button"
                                    aria-haspopup="true"
                                    :aria-expanded="(open || isActive) ? 'true' : 'false'"
                                >
                  <span aria-hidden="true"><i class='bx bxs-dashboard bx-tada' ></i>
                  </span>
                                    <span class="ml-2 "> Dashboards </span>
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
                                        href="<?php echo e(route('dashboard.users')); ?>" wire:navigate role="menuitem"
                                        class="block p-2  <?php echo e(Route::is('dashboard.users')?'text-gray-700 dark:text-light':'text-gray-400'); ?> transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                    >
                                        <?php echo app('translator')->get('users'); ?>
                                    </a>
                                    <a
                                        href="<?php echo e(route('dashboard.update.password')); ?>" wire:navigate role="menuitem"
                                        class="block p-2  <?php echo e(Route::is('dashboard.update.password')?'text-gray-700 dark:text-light':'text-gray-400'); ?> transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                    >
                                        <?php echo app('translator')->get('update password'); ?>
                                    <a
                                        href="<?php echo e(route('dashboard.update.profile')); ?>" wire:navigate role="menuitem"
                                        class="block p-2  <?php echo e(Route::is('dashboard.update.profile')?'text-gray-700 dark:text-light':'text-gray-400'); ?> transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                    >
                                        <?php echo app('translator')->get('update profile'); ?>
                                    </a>
                                    <a
                                        href="<?php echo e(route('dashboard.vendor.details')); ?>" wire:navigate role="menuitem"
                                        class="block p-2  <?php echo e(Route::is('dashboard.vendor.details')?'text-gray-700 dark:text-light':'text-gray-400'); ?> transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                    >
                                        <?php echo app('translator')->get('vendor details'); ?>
                                    </a>
                                    <a
                                        href="<?php echo e(route('dashboard.categories')); ?>" wire:navigate role="menuitem"
                                        class="block p-2  <?php echo e(Route::is('dashboard.categories')?'text-gray-700 dark:text-light':'text-gray-400'); ?> transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                    >
                                        <?php echo app('translator')->get('categories'); ?>
                                    </a>
                                </div>
                            </div>


                        <a href="<?php echo e(route('dashboard.logout')); ?>" wire:navigate class="<?php echo e(Route::is('login')?'bg-primary-100 dark:bg-primary':''); ?> flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                            <span aria-hidden="true"><i class='bx bx-log-out-circle bx-tada' ></i></span>
                            <span class="ml-2 "> <?php echo app('translator')->get('logout'); ?> </span>
                        </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>" wire:navigate class="<?php echo e(Route::is('login')?'bg-primary-100 dark:bg-primary':''); ?> flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                            <span aria-hidden="true"><i class='bx bx-log-in-circle bx-tada' ></i></span>
                            <span class="ml-2 "> <?php echo app('translator')->get('login'); ?> </span>
                        </a>




                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                </nav>

                <!-- Sidebar footer -->
                <div class="flex-shrink-0 px-2 py-4 space-y-2">
                    <button
                        @click="openSettingsPanel"
                        type="button"
                        class="flex items-center justify-center w-full px-4 py-2  text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark"
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
<?php /**PATH /home/hralamin/www/almn/resources/views/livewire/sidebar-component.blade.php ENDPATH**/ ?>