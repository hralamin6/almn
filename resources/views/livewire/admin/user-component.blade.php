<div class="items-center justify-center p-2 h-screen capitalize" x-data="user()">
    <main class="h-full">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <div class="flex items-center gap-x-3">
                    <h2 class="text-lg font-medium text-gray-800 dark:text-white">Customers</h2>

                    <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240 vendors</span>
                </div>
            </div>

            <div class="flex items-center mt-4 gap-x-3">
                <button wire:click="generate_pdf" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-darker hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <x-h-o-arrow-down-tray />
                    <span>@lang('export pdf')</span>
                </button>

                <button x-cloak @click="toggleModal" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <span>Add vendor</span>
                </button>
            </div>
        </div>

        <div class="mt-6 md:flex md:items-center md:justify-between">
            <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-darker rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                    View all
                </button>

                <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                    Monitored
                </button>

                <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                    Unmonitored
                </button>
            </div>

            <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

                <input wire:model.blur="search" type="text" placeholder="Search" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-darker dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
            </div>
        </div>
        <section class="container px-4 mx-auto">
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr class="text-center object-cover items-center h-10">
                                    <th scope="col" class="px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <input type="checkbox" class="text-blue-500 border-gray-300 rounded dark:bg-darker dark:ring-offset-gray-900 dark:border-gray-700">
                                            <span>Name</span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-12 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <button class="flex items-center gap-x-2">
                                            <span>Status</span>

                                            <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                            </svg>
                                        </button>
                                    </th>
                                    <th scope="col" class="px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">@lang('phone')</th>
                                    <th scope="col" class="px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">@lang('address')</th>
                                    <th scope="col" class="px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">@lang('type')</th>
                                    <th scope="col" class="px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">@lang('action')</th>


                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-darker">
                                @forelse($items as $i => $item)

                                    <tr id="id_{{$item->id}}" wire:key="{{$item->id}}">
                                    <td class="px-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-x-3">
                                            <input type="checkbox" class="text-blue-500 border-gray-300 rounded dark:bg-darker dark:ring-offset-gray-900 dark:border-gray-700">

                                            <div class="flex items-center gap-x-2">
                                                <img class="object-cover w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="">
                                                <div>
                                                    <h2 class="font-medium text-gray-800 dark:text-white ">{{ $item->name }}</h2>
                                                    <p class="text-sm font-normal text-gray-600 dark:text-gray-400">{{ $item->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-12 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                            <h2 class="text-sm font-normal {{ $item->status=='active'?'text-emerald-500':'text-pink-500' }} ">{{ $item->status }}</h2>
                                        </div>
                                    </td>
                                    <td class="px-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->phone }}</td>
                                    <td class="px-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->address }}</td>
                                    <td class="text-sm font-normal {{ $item->type=='blogger'?'text-emerald-500':($item->type=='user'?'text-pink-500':'text-green-500')}} ">{{ $item->type }}</td>

                                    <td class="px-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">
                                            <button @click="editModal('{{$item->id}}')" class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                <x-h-o-pencil-square class="text-green-400" />
                                            </button>

                                            <button @click.prevent="$dispatch('open-delete-modal', { title: 'Are you sure to delete', text: 'It is not revertable', icon: 'error', itemId: {{$item->id}} })"
                                                class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                <x-h-o-trash class="text-red-400" />
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty

                                @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <div class="mx-auto my-4 px-4">
                                {{ $items->links() }}
{{--            {{ $items->links() }}--}}
        </div>
    </main>

    <div x-cloak x-show="isOpen">
        <div class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <div  class="inset-0 rounded-2xl transition duration-150 ease-in-out z-50 absolute" id="modal">
            <div @click.outside="closeModal" class="container mx-auto w-11/12 md:w-2/3 max-w-lg ">
                <form @submit.prevent="editMode? $wire.editData(): $wire.saveData()" class="relative py-3 px-5 md:px-10 bg-white dark:bg-darker shadow-md rounded border border-gray-400 dark:border-gray-600 capitalize">
                    <h1 x-cloak x-show="!editMode" class="text-gray-800 dark:text-gray-200 font-lg font-semibold text-center mb-4">@lang('add new data')</h1>
                    <h1 x-cloak x-show="editMode" class="text-gray-800 dark:text-gray-200 font-lg font-semibold text-center mb-4">@lang('edit this data')</h1>

                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="input">@lang('name')</label>
                            <x-input  errorName="name" errorName="name" x-ref="input" id="input" wire:model="name" type="text" />
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="email">@lang('email')</label>
                            <x-input  errorName="email" wire:model="email" type="email"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="address">@lang('address')</label>
                            <x-input  errorName="address" wire:model="address" type="text"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="note">@lang('bio')</label>
                            <x-input  errorName="bio" wire:model="bio" type="text"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="phone">@lang('phone')</label>
                            <x-input  errorName="phone" wire:model="phone" type="tel"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="instagram">@lang('instagram')</label>
                            <x-input  errorName="instagram" wire:model="instagram" type="url"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="twitter">@lang('twitter')</label>
                            <x-input  errorName="twitter" wire:model="twitter" type="url"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="facebook">@lang('facebook')</label>
                            <x-input  errorName="facebook" wire:model="facebook" type="url"/>
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="type">@lang('type')</label>
                            <x-select id="type" wire:model="type" >
                                <option value="admin">@lang('admin')</option>
                                <option value="user">@lang('user')</option>
                                <option value="customer">@lang('blogger')</option>
                            </x-select>
                            @error('type')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="type">@lang('status')</label>
                            <x-select id="status" wire:model="status" >
                                <option value="active">@lang('active')</option>
                                <option value="inactive">@lang('inactive')</option>
                            </x-select>
                            @error('status')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="password">@lang('password')</label>
                            <x-input  errorName="password" id="password" wire:model="password" type="password" />
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="confirmPassword">@lang('confirmPassword')</label>
                            <x-input  errorName="confirmPassword" wire:model="confirmPassword" type="password"/>
                        </div>
                    </div>

                    <div class="flex items-center justify-between w-full mt-4">
                        <button type="button" @click="closeModal" class="bg-red-600 focus:ring-gray-400 transition duration-150 text-white ease-in-out hover:bg-red-300 rounded px-8 py-2 text-sm">Cancel</button>
                        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @push('js')

        <script>


            const user = () => {

                return {
                    isOpen: false,
                    editMode: false,
                    toggleModal() {
                        this.isOpen = !this.isOpen
                    },
                    closeModal() {
                        this.isOpen = false; this.editMode = false;
                        // $wire.resetData()
                    },
                    editModal(id) {
                        this.$wire.loadData(id); this.isOpen = true; this.editMode = true;
                    },
                }

            }
        </script>
    @endpush
    @script
    <script>
        document.addEventListener('open-delete-modal', function(event) {
            itemId = event.detail.itemId
            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

            }).then((result) => {
                if (result.isConfirmed) {
                    $wire.deleteSingle(itemId)
                }
            })
        });
    </script>
    @endscript
</div>
