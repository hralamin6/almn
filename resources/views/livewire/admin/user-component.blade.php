<div class="items-center justify-center p-2 min-h-screen capitalize" x-data="user()">
    <main class="h-full">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <div class="flex items-center gap-x-3">
                    <h2 class="text-lg font-medium text-gray-800 dark:text-white">@lang('users')</h2>

                    <span
                        class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">@lang('total'): {{ $items->total() }}</span>
                </div>
            </div>

            <div class="flex items-center mt-4 gap-x-3">
                <button wire:click="generate_pdf"
                        class="capitalize flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-darker hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <x-h-o-arrow-down-tray/>
                    <span>@lang('export pdf')</span>
                </button>

                <button x-cloak @click="toggleModal"
                        class="capitalize flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                    <x-h-o-plus-circle/>
                    <span>@lang('add new')</span>
                </button>
            </div>
        </div>

        <div class="mt-6 md:flex md:items-center md:justify-between capitalize">
            <div
                class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-darker rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                <button wire:click="$set('itemStatus', null)"
                        class="capitalize px-5 py-2 text-xs font-medium  transition-colors duration-200 sm:text-sm text-gray-600 {{!$itemStatus?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'}} ">
                    @lang('all')
                </button>

                <button wire:click="$set('itemStatus', 'active')"
                        class="capitalize px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm {{$itemStatus=='active'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'}}">
                    @lang('active')
                </button>

                <button wire:click="$set('itemStatus', 'inactive')"
                        class="capitalize px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm {{$itemStatus=='inactive'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'}}">
                    @lang('inactive')
                </button>

            </div>

            <div class="flex items-center justify-between space-x-2 capitalize">
                <div class=" mt-4 md:mt-0 w-24 md:w-48">
                    <x-input wire:model.blur="itemPerPage" type="number" class="appearance-hidden dark:bg-darker"/>
                </div>
                <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <x-h-o-magnifying-glass class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600"/>
            </span>
                    <input wire:model.blur="search" type="text" placeholder="Search"
                           class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-darker dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                    <x-select id="searchBy" wire:model.live="searchBy" class="dark:bg-darker capitalize">
                        <option value="name">@lang('name')</option>
                        <option value="email">@lang('email')</option>
                        <option value="address">@lang('address')</option>
                        <option value="phone">@lang('phone')</option>
                        <option value="bio">@lang('bio')</option>
                    </x-select>
                </div>
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
                                    <th class="pl-2 flex items-center justify-between mt-4">
                                        <input x-model="selectPage" type="checkbox"
                                               class="justify-between text-blue-500 border-gray-300 rounded dark:bg-darker dark:ring-offset-gray-900 dark:border-gray-700">
                                        <div x-cloak x-show="rows.length > 0 " class="flex items-center justify-center"
                                             x-data="{bulk: false}">
                                            <div class="relative inline-block">
                                                <!-- Dropdown toggle button -->
                                                <button @click="bulk=!bulk"
                                                        class="relative z-10 block px-2 text-gray-700 border border-transparent rounded-md dark:text-white focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="w-5 h-5 text-gray-800 dark:text-white"
                                                         viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                                    </svg>
                                                </button>

                                                <!-- Dropdown menu -->
                                                <div x-show="bulk"
                                                     class="absolute left-0 z-20 w-48 py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800"
                                                     @click.outside="bulk= false">
                                                    <a @click="$dispatch('deleteMultiple', { title: 'Are you sure to delete', text: 'It is not revertable', icon: 'error' })"
                                                       class="cursor-pointer block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                        Delete </a>
                                                    {{--                                                    <a wire:click.prevent="" class="cursor-pointer block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Your projects </a>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <x-field :OB="$orderBy" :OD="$orderDirection"
                                             :field="'name'">@lang('name')</x-field>
                                    <x-field :OB="$orderBy" :OD="$orderDirection"
                                             :field="'status'">@lang('status')</x-field>
                                    <x-field :OB="$orderBy" :OD="$orderDirection"
                                             :field="'phone'">@lang('phone')</x-field>
                                    <x-field :OB="$orderBy" :OD="$orderDirection"
                                             :field="'address'">@lang('address')</x-field>
                                    <x-field :OB="$orderBy" :OD="$orderDirection"
                                             :field="'type'">@lang('type')</x-field>
                                    <x-field>@lang('action')</x-field>


                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-darker">
                                @forelse($items as $i => $item)

                                    <tr id="id_{{$item->id}}" wire:key="{{$item->id}}">
                                        <td class="pl-2"><input x-model="rows" value="{{$item->id}}"
                                                                id="{{ $item->id }}" type="checkbox"
                                                                class="justify-between text-blue-500 border-gray-300 rounded dark:bg-darker dark:ring-offset-gray-900 dark:border-gray-700">
                                        </td>

                                        <td class="px-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <div class="flex items-center gap-x-2">
                                                    <img class="object-cover w-10 h-10 rounded-full"
                                                         src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                                         alt="">
                                                    <div>
                                                        <h2 class="font-medium text-gray-800 dark:text-white ">{{ $item->name }}</h2>
                                                        <p class="text-sm font-normal text-gray-600 dark:text-gray-400">{{ $item->email }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-12 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                                <h2 class="text-sm font-normal {{ $item->status=='active'?'text-emerald-500':'text-pink-500' }} ">{{ $item->status }}</h2>
                                            </div>
                                        </td>

                                        <td class="px-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->phone }}</td>
                                        <td class="px-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ str($item->address)->words(5) }}</td>
                                        <td class="text-sm font-normal {{ $item->type=='blogger'?'text-emerald-500':($item->type=='user'?'text-pink-500':'text-green-500')}} ">{{ $item->type }}</td>

                                        <td class="px-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6">
                                                <button @click="editModal('{{$item->id}}')"
                                                        class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                    <x-h-o-pencil-square class="text-green-400"/>
                                                </button>

                                                <button
                                                    @click.prevent="$dispatch('deleteSingle', { title: 'Are you sure to delete', text: 'It is not revertable', icon: 'error', itemId: {{$item->id}} })"
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                    <x-h-o-trash class="text-red-400"/>
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
        <div class="mx-auto my-4 px-4 overflow-y-auto">
            {{ $items->links() }}
            {{--            {{ $items->links() }}--}}
        </div>
    </main>

    <div x-cloak x-show="isOpen">
        <div class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <div class="inset-0 rounded-2xl transition duration-150 ease-in-out z-50 absolute" id="modal">
            <div @click.outside="closeModal" class="container mx-auto w-11/12 md:w-2/3 max-w-lg ">
                <form @submit.prevent="editMode? $wire.editData(): $wire.saveData()"
                      class="relative py-3 px-5 md:px-10 bg-white dark:bg-darker shadow-md rounded border border-gray-400 dark:border-gray-600 capitalize">
                    <h1 x-cloak x-show="!editMode"
                        class="text-gray-800 dark:text-gray-200 font-lg font-semibold text-center mb-4">@lang('add new data')</h1>
                    <h1 x-cloak x-show="editMode"
                        class="text-gray-800 dark:text-gray-200 font-lg font-semibold text-center mb-4">@lang('edit this data')</h1>

                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="input">@lang('name')</label>
                            <x-input errorName="name" errorName="name" x-ref="input" id="input" wire:model="name"
                                     type="text"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="email">@lang('email')</label>
                            <x-input errorName="email" wire:model="email" type="email"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="address">@lang('address')</label>
                            <x-input errorName="address" wire:model="address" type="text"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="note">@lang('bio')</label>
                            <x-input errorName="bio" wire:model="bio" type="text"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="phone">@lang('phone')</label>
                            <x-input errorName="phone" wire:model="phone" type="tel"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="instagram">@lang('instagram')</label>
                            <x-input errorName="instagram" wire:model="instagram" type="url"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="twitter">@lang('twitter')</label>
                            <x-input errorName="twitter" wire:model="twitter" type="url"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="facebook">@lang('facebook')</label>
                            <x-input errorName="facebook" wire:model="facebook" type="url"/>
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="type">@lang('type')</label>
                            <x-select id="type" wire:model="type">
                                <option value="admin">@lang('admin')</option>
                                <option value="user">@lang('user')</option>
                                <option value="customer">@lang('blogger')</option>
                            </x-select>
                            @error('type')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="type">@lang('status')</label>
                            <x-select id="status" wire:model="status">
                                <option value="active">@lang('active')</option>
                                <option value="inactive">@lang('inactive')</option>
                            </x-select>
                            @error('status')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="password">@lang('password')</label>
                            <x-input errorName="password" id="password" wire:model="password" type="password"/>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200"
                                   for="confirmPassword">@lang('confirmPassword')</label>
                            <x-input errorName="confirmPassword" wire:model="confirmPassword" type="password"/>
                        </div>
                    </div>

                    <div class="flex items-center justify-between w-full mt-4">
                        <button type="button" @click="closeModal"
                                class="bg-red-600 focus:ring-gray-400 transition duration-150 text-white ease-in-out hover:bg-red-300 rounded px-8 py-2 text-sm">
                            Cancel
                        </button>
                        <button type="submit"
                                class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @script
    <script>
            Alpine.data('user', () => ({
                init() {
                    // This code will be executed before Alpine
                    // initializes the rest of the component.
                },
                isOpen: false,
                editMode: false,
                rows: @entangle('selectedRows'),
                selectPage: @entangle('selectPageRows').live,
                toggleModal() {
                    this.isOpen = !this.isOpen
                },
                closeModal() {
                    this.isOpen = false;
                    this.editMode = false;
                    // $wire.resetData()
                },
                editModal(id) {
                    this.$wire.loadData(id);
                    this.isOpen = true;
                    this.editMode = true;
                }
            }))
        document.addEventListener('deleteSingle', function (event) {
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
        document.addEventListener('deleteMultiple', function (event) {
            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

            }).then((result) => {
                if (result.isConfirmed) {
                    $wire.deleteMultiple()
                }
            })
        });
    </script>
    @endscript
</div>
