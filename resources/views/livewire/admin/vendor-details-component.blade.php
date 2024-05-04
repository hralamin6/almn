<div  class="items-center justify-center p-2 min-h-screen capitalize" x-data="vendorDetails()">
    <main class="h-full">
        <div
            class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-darker rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
            <button @click="nav='vendor'" :class="nav=='vendor'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'"
                    class="capitalize px-5 py-2 text-xs font-medium  transition-colors duration-200 sm:text-sm text-gray-600 ">
                @lang('vendor')
            </button>

            <button @click="nav='vendordetail'" :class="nav=='vendordetail'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'"
                    class="capitalize px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm">
                @lang('vendor details')
            </button>

            <button @click="nav='bankdetail'" :class="nav=='bankdetail'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'"
                    class="capitalize px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm">
                @lang('bank details')
            </button>

        </div>
    <section x-show="nav=='vendor'" class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-darker capitalize">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">@lang('update vendor')</h2>

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
                    <label class="text-gray-700 dark:text-gray-200" for="emailAddress">@lang('address')</label>
                    <input wire:model="address" id="mobile" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('address')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="emailAddress">@lang('pin code')</label>
                    <input wire:model="pin_code" id="mobile" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('pin_code')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
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
                <button wire:click.prevent="updateVendor" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>
    <section x-show="nav=='vendordetail'" class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-darker capitalize">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">@lang('update vendor details')</h2>

        <form>
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="username">@lang('shop name')</label>
                    <input wire:model="shop_name" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('shop_name')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
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
                    <label class="text-gray-700 dark:text-gray-200" for="emailAddress">@lang('address')</label>
                    <input wire:model="address" id="mobile" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('address')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="emailAddress">@lang('pin code')</label>
                    <input wire:model="pin_code" id="mobile" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('pin_code')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
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
                <button wire:click.prevent="updateVendor" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>
    <section x-show="nav=='bankdetail'" class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-darker capitalize">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">@lang('update bank details')</h2>

        <form>
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="username">@lang('bank name')</label>
                    <input wire:model="bank_name" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('bank_name')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="emailAddress">@lang('account holder name')</label>
                    <input wire:model="account_holder_name" id="account_holder_name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('account_holder_name')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="emailAddress">@lang('bank ifsc code')</label>
                    <input wire:model="bank_ifsc_code" id="mobile" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('bank_ifsc_code')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="emailAddress">@lang('account number')</label>
                    <input wire:model="account_number" id="mobile" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    @error('account_number')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>

            </div>

            <div class="flex justify-end mt-6">
                <button wire:click.prevent="updateBank" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>
    </main>
    @script
    <script>
        Alpine.data('vendorDetails', () => ({
            init() {

            },
            nav: $persist('vendor')
        }))

    </script>
    @endscript
</div>
