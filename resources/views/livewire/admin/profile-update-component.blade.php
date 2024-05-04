<div  class="items-center justify-center p-2 min-h-screen capitalize">
    <main class="h-full">
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-darker capitalize">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">@lang('update password')</h2>

        <form>
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="username">@lang('name')</label>
                    <input wire:model="name" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('name')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="emailAddress">@lang('email')</label>
                    <input wire:model="email" id="email" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('email')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="emailAddress">@lang('mobile')</label>
                    <input wire:model="mobile" id="mobile" type="tel" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('mobile')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="type">@lang('type')</label>
                    <x-select id="type" wire:model="type">
                        <option value="">@lang('select type')</option>
                        <option value="superadmin">@lang('admin')</option>
                        <option value="admin">@lang('user')</option>
                        <option value="vendor">@lang('blogger')</option>
                    </x-select>
                    @error('type')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="type">@lang('status')</label>
                    <x-select id="status" wire:model="status">
                        <option value="">@lang('select status')</option>
                        <option value="1">@lang('active')</option>
                        <option value="0">@lang('inactive')</option>
                    </x-select>
                    @error('status')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button wire:click.prevent="updateProfile" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>
    </main>
</div>
