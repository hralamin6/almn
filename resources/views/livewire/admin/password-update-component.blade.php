<div  class="items-center justify-center p-2 min-h-screen capitalize">
    <main class="h-full">
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-darker capitalize">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">@lang('update password')</h2>

        <form>
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="username">@lang('email')</label>
                    <input id="username" disabled type="text" value="{{$user->email}}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="emailAddress">@lang('type')</label>
                    <input id="emailAddress" disabled value="{{$user->type}}" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="password">@lang('current password')</label>
                    <input x-model="cp" wire:model.live="currentPassword" id="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    @if($checkPassword==false & $currentPassword!=null)<p class="text-sm text-red-400">@lang('current password is wrong')</p>@elseif($checkPassword==true) <p class="text-sm text-green-400">@lang('current password is correct')</p> @endif

                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="password">@lang('new password')</label>
                    <input wire:model="newPassword" id="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">

                    @error('newPassword')
                    <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="passwordConfirmation">Password Confirmation</label>
                    <input wire:model="confirmPassword" id="passwordConfirmation" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button wire:click.prevent="updatePassword" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>
    </main>

</div>
