<div  class="items-center justify-center p-2 min-h-screen capitalize" x-data="user()">
    <div x-show="isOpen" class="text-sm mx-auto md:w-1/2">
        <form @submit.prevent="editMode? $wire.editData(): $wire.saveData()"
              class="relative py-3 px-2 md:px-10 bg-white dark:bg-darker shadow-md rounded border border-gray-400 dark:border-gray-600 capitalize">
            <h1 x-cloak x-show="!editMode"
                class="text-gray-800 dark:text-gray-200 font-lg font-semibold text-center mb-4">@lang('add new data')</h1>
            <h1 x-cloak x-show="editMode"
                class="text-gray-800 dark:text-gray-200 font-lg font-semibold text-center mb-4">@lang('edit this data')</h1>

            <div class="grid grid-cols-1 gap-2 md:space-x-12 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="input">@lang('name')</label>
                    <x-input errorName="name" errorName="name" x-ref="inputName" id="input" wire:model="name"
                             type="text"/>
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="meaning">@lang('meaning')</label>
                    <x-input errorName="meaning" wire:model="meaning" type="text"/>
                </div>
                <div class="flex justify-center space-x-4">
                    <div class="space-x-1">
                        <input type="radio" wire:model="gender" value="male" id="male">
                        <label for="male">Male</label>
                    </div>
                    <div class="space-x-1">
                        <input type="radio" wire:model="gender" value="female" id="female">
                        <label for="female">Female</label>
                    </div>
                    @error('gender')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
                </div>
                <div class="flex justify-center space-x-4">
                    <div class="space-x-1">
                        <input type="radio" wire:model="pop" value="noun" id="noun">
                        <label for="noun">Noun</label>
                    </div>
                    <div class="space-x-1">
                        <input type="radio" wire:model="pop" value="adjective" id="adjective">
                        <label for="adjective">Adjective</label>
                    </div>
                    <div class="space-x-1">
                        <input type="radio" wire:model="pop" value="verb" id="verb">
                        <label for="verb">Verb</label>
                    </div>
                    @error('gender')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
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

    <div class="h-full">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="mt-2 md:flex md:items-center md:justify-between capitalize">

                <div class="flex items-center justify-between space-x-2 capitalize">
                    <div class=" md:mt-0 w-24 md:w-48">
                        <x-input wire:model.live="itemPerPage" type="number" class="appearance-hidden dark:bg-darker"/>
                    </div>
                    <div class="relative flex items-center  md:mt-0">
            <span class="absolute">
                <x-h-o-magnifying-glass class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600"/>
            </span>
                        <input wire:model.live="search" type="text" placeholder="Search"
                               class="w-48 block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-darker dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                        <x-select id="searchBy" wire:model.live="searchBy" class="w-48 dark:bg-darker capitalize">
                            <option value="name">@lang('name')</option>
                            <option value="meaning">@lang('meaning')</option>
                        </x-select>
                    </div>
                </div>

            </div>

            <div class="flex items-center justify-between mt-2 gap-x-1">
                @auth
                    @can('isAdmin')
                        <div>
                            <form wire:submit="import">
                                @csrf
                                <div
                                    x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false, $wire.import()"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                >
                                    <label for="dropzone-file" class="flex flex-col items-center w-full max-w-lg px-1 mx-auto text-center bg-white border-2 border-gray-300 border-dashed cursor-pointer dark:bg-darker dark:border-gray-700 rounded-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500 dark:text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                        </svg>
                                        <input id="dropzone-file" type="file" class="hidden" wire:model="photo" />
                                    </label>
                                    @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
                                    {{--                            <button type="submit" class="btn btn-primary">Import Users</button>--}}
                                    <div wire:loading wire:target="photo, import">...</div>
                                    <div x-show="isUploading">
                                        <progress max="100" x-bind:value="progress"></progress>
                                    </div>
                                </div>
                            </form>

                        </div>

                    @endcan
                @endauth
                <button wire:click.prevent="generate_pdf"
                        class="capitalize flex items-center justify-center w-1/2 px-2 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-darker hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <x-h-o-arrow-down-tray/>
                    <span>@lang('pdf')</span>
                </button>
                <button wire:click.prevent="export"
                        class="capitalize flex items-center justify-center w-1/2 px-2 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-darker hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <x-h-o-arrow-down-tray/>
                    <span>@lang('excel')</span>
                </button>

                    @auth
                <button x-cloak @click="toggleModal"
                        class="capitalize flex items-center justify-center w-1/2 px-2 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-darker hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <x-h-o-plus-circle/>
                    <span>@lang('add')</span>
                </button>
                    @endauth
            </div>

        </div>
        <div class="flex space-x-2 justify-between">
            <div class="inline-flex overflow-hidden mt-2 bg-white border divide-x rounded-lg dark:bg-darker rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                <button wire:click="$set('itemGender', null)"
                        class="capitalize px-2 py-2 text-xs font-medium  transition-colors duration-200 sm:text-sm text-gray-600 {{!$itemGender?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'}} ">
                    @lang('all')
                </button>

                <button wire:click="$set('itemGender', 'male')"
                        class="capitalize px-2 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm {{$itemGender=='male'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'}}">
                    @lang('male')
                </button>

                <button wire:click="$set('itemGender', 'female')"
                        class="capitalize px-2 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm {{$itemGender=='female'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'}}">
                    @lang('female')
                </button>

            </div>
            <div class="inline-flex overflow-hidden mt-2 bg-white border divide-x rounded-lg dark:bg-darker rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                <button wire:click="$set('itemPop', null)"
                        class="capitalize px-2 py-2 text-xs font-medium  transition-colors duration-200 sm:text-sm text-gray-600 {{!$itemPop?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'}} ">
                    @lang('all')
                </button>

                <button wire:click="$set('itemPop', 'noun')"
                        class="capitalize px-2 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm {{$itemPop=='noun'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'}}">
                    @lang('noun')
                </button>

                <button wire:click="$set('itemPop', 'adjective')"
                        class="capitalize px-2 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm {{$itemPop=='adjective'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'}}">
                    @lang('adj')
                </button>
                <button wire:click="$set('itemPop', 'verb')"
                        class="capitalize px-2 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm {{$itemPop=='verb'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'}}">
                    @lang('verb')
                </button>

            </div>
        </div>

        <div class="container px-4 mx-auto">

            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class=" border border-gray-200 dark:border-gray-700 md:rounded-lg">
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
                                                @auth
                                                        <div x-show="bulk"
                                                             class="absolute  z-50 left-0 w-48 py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800"
                                                             @click.outside="bulk= false">

                                                                                                                @can('isAdmin')
                                                            <a @click="$dispatch('delete', { title: 'Are you sure to delete', text: 'It is not revertable', icon: 'error',actionName: 'deleteMultiple', itemId: '' })"
                                                               class="cursor-pointer block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                                Delete </a>
                                                                                                                    @endcan

                                                                <a @click="$dispatch('delete', { title: 'Do you want to add to wishlist', text: 'You can change it again', icon: 'warning',actionName: 'wishListMultiple', itemId: '' })"
                                                               class="cursor-pointer block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                                @lang('wishlist') </a>
                                                                <a @click="$dispatch('delete', { title: 'Do you want to add to your words', text: 'You can change it again', icon: 'success',actionName: 'createMultiple', itemId: '' })"
                                                               class="cursor-pointer block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                                @lang('my words') </a>
                                                                {{--                                                    <a wire:click.prevent="" class="cursor-pointer block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Your projects </a>--}}
                                                        </div>
                                                @endauth

                                            </div>
                                        </div>
                                    </th>
                                    <x-field :OB="$orderBy" :OD="$orderDirection"
                                             :field="'name'">@lang('word')</x-field>
{{--                                    @can('isAdmin')--}}
{{--                                        <x-field :OB="$orderBy" :OD="$orderDirection"--}}
{{--                                                 :field="'status'">@lang('status')</x-field>--}}
{{--                                        <x-field :OB="$orderBy" :OD="$orderDirection"--}}
{{--                                                 :field="'user_id'">@lang('creator')</x-field>--}}
{{--                                    @endcan--}}
                                    <x-field :OB="$orderBy" :OD="$orderDirection"
                                             :field="'meaning'">@lang('meaning')</x-field>
                                    {{--                                    <x-field :OB="$orderBy" :OD="$orderDirection"--}}
                                    {{--                                             :field="'male_name'">@lang('male_name')</x-field>--}}
                                    {{--                                    <x-field :OB="$orderBy" :OD="$orderDirection"--}}
                                    {{--                                             :field="'female_name'">@lang('female_name')</x-field>--}}
                                    <x-field :OB="$orderBy" :OD="$orderDirection"
                                             :field="'gender'">@lang('gender')</x-field>
                                    <x-field :OB="$orderBy" :OD="$orderDirection"
                                             :field="'pop'">@lang('pop')</x-field>
                                    <x-field>@lang('action')</x-field>


                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-darker">
                                @forelse($items as $i => $item)

                                    <tr @if($loadId==$item->id) wire:scroll @endif id="item-id-{{$item->id}}" class="@if($loadId==$item->id) dark:bg-gray-500 bg-green-100 animate-pulse @endif text-gray-700 dark:text-gray-300 capitalize" :class="{'bg-gray-200 dark:bg-gray-600': rows.includes('{{$item->id}}') }">
                                        <td class="pl-2">
                                            <input x-model="rows" value="{{$item->id}}" id="{{ $item->id }}" type="checkbox" class="justify-between text-blue-500 border-gray-300 rounded dark:bg-darker dark:ring-offset-gray-900 dark:border-gray-700">
                                        </td>

                                        <td class="px-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <div class="flex items-center gap-x-2">
                                                    <div>
                                                        <h2 class="font-medium text-gray-800 dark:text-white ">{{ $item->with_harakah }}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
{{--                                        @can('isAdmin')--}}
{{--                                            <td class="px-12 text-sm font-medium text-gray-700 whitespace-nowrap">--}}
{{--                                                <div--}}
{{--                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">--}}
{{--                                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>--}}

{{--                                                    <button type="button" wire:click="changeStatus({{ $item->id }})" class="cursor-pointer text-sm font-normal {{ $item->status=='active'?'text-emerald-500':'text-pink-500' }} ">{{ $item->status }}</button>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="px-4 text-sm font-medium text-gray-700 whitespace-nowrap">--}}
{{--                                                <div class="inline-flex items-center gap-x-3">--}}
{{--                                                    <div class="flex items-center gap-x-2">--}}
{{--                                                        <div>--}}
{{--                                                            <h2 class="font-medium text-gray-800 dark:text-white ">{{ $item->user->name }}</h2>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        @endcan--}}

                                        <td class="px-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap text-lg font-bangla">{{ $item->meaning }}</td>
                                        {{--                                        <td class="px-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->male_name }}</td>--}}
                                        {{--                                        <td class="px-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->female_name }}</td>--}}
                                        <td class="text-sm font-normal {{ $item->gender=='male'?'text-emerald-500':($item->gender=='female'?'text-pink-500':'text-green-500')}} ">{{ $item->gender }}</td>
                                        <td class="text-sm font-normal {{ $item->pop=='noun'?'text-emerald-500':($item->pop=='adjective'?'text-pink-500':'text-green-500')}} ">{{ $item->pop }}</td>
                                        <td class="px-4 text-sm whitespace-nowrap">
                                            @auth()
                                                <div class="flex items-center gap-x-6">
                                                    @can('isAdmin')
                                                        <button @click="editModal('{{$item->id}}')"
                                                                class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                            <x-h-o-pencil-square class="text-green-400"/>
                                                        </button>

                                                        <button
                                                            @click.prevent="$dispatch('delete', { title: 'Are you sure to delete', text: 'It is not revertable', icon: 'error',actionName: 'deleteSingle', itemId: {{$item->id}} })"
                                                            class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                            <x-h-o-trash class="text-red-400"/>
                                                        </button>
                                                    @endcan
                                                    <button wire:click="addToWishlist('{{$item->id}}')"
                                                            class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                        @if(auth()->user()->words()->where('word_id',$item->id)->first())
                                                            <x-h-s-heart class="text-red-400"/>
                                                        @else
                                                            <x-h-o-heart class="text-green-400"/>
                                                        @endif
                                                    </button>

                                                </div>
                                            @endauth
                                            @guest
                                                <a href="{{ route('socialite.auth', 'google') }}"
                                                   class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                    <x-h-o-heart class="text-green-400"/>
                                                </a>
                                            @endguest
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

        </div>
        <div class="mx-auto my-4 px-4 overflow-y-auto">
            {{ $items->links() }}
            {{--            {{ $items->links() }}--}}
        </div>
    </div>
    </main>

{{--    <div x-cloak x-show="isOpen">--}}
{{--        <div class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>--}}
{{--        <div class="inset-0 rounded-2xl transition duration-150 ease-in-out z-50 absolute" id="modal">--}}
{{--            <div @click.outside="closeModal" class="container mx-auto w-11/12 md:w-2/3 max-w-lg ">--}}
{{--                <form @submit.prevent="editMode? $wire.editData(): $wire.saveData()"--}}
{{--                      class="relative py-3 px-2 md:px-10 bg-white dark:bg-darker shadow-md rounded border border-gray-400 dark:border-gray-600 capitalize">--}}
{{--                    <h1 x-cloak x-show="!editMode"--}}
{{--                        class="text-gray-800 dark:text-gray-200 font-lg font-semibold text-center mb-4">@lang('add new data')</h1>--}}
{{--                    <h1 x-cloak x-show="editMode"--}}
{{--                        class="text-gray-800 dark:text-gray-200 font-lg font-semibold text-center mb-4">@lang('edit this data')</h1>--}}

{{--                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">--}}
{{--                        <div>--}}
{{--                            <label class="text-gray-700 dark:text-gray-200" for="input">@lang('name')</label>--}}
{{--                            <x-input errorName="name" errorName="name" x-ref="inputName" id="input" wire:model="name"--}}
{{--                                     type="text"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label class="text-gray-700 dark:text-gray-200" for="male_name">@lang('male_name')</label>--}}
{{--                            <x-input errorName="male_name" wire:model="male_name" type="text"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label class="text-gray-700 dark:text-gray-200" for="female_name">@lang('female_name')</label>--}}
{{--                            <x-input errorName="female_name" wire:model="female_name" type="text"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label class="text-gray-700 dark:text-gray-200" for="meaning">@lang('meaning')</label>--}}
{{--                            <x-input errorName="meaning" wire:model="meaning" type="text"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label for="male">Male</label>--}}
{{--                            <input type="radio" wire:model="gender" value="male" id="male">--}}

{{--                            <label for="female">Female</label>--}}
{{--                            <input type="radio" wire:model="gender" value="female" id="female">--}}

{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <label class="text-gray-700 dark:text-gray-200" for="type">@lang('gender')</label>--}}
{{--                            <x-select id="gender" wire:model="gender">--}}
{{--                                <option value="">@lang('select gender')</option>--}}
{{--                                <option value="male">@lang('male')</option>--}}
{{--                                <option value="female">@lang('female')</option>--}}
{{--                            </x-select>--}}
{{--                            @error('gender')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label class="text-gray-700 dark:text-gray-200" for="type">@lang('pop')</label>--}}
{{--                            <x-select id="pop" wire:model="pop">--}}
{{--                                <option value="">@lang('select pop')</option>--}}
{{--                                <option value="noun">@lang('noun')</option>--}}
{{--                                <option value="pronoun">@lang('pronoun')</option>--}}
{{--                                <option value="adverb">@lang('adverb')</option>--}}
{{--                                <option value="adjective">@lang('adjective')</option>--}}
{{--                                <option value="verb">@lang('verb')</option>--}}
{{--                            </x-select>--}}
{{--                            @error('pop')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label class="text-gray-700 dark:text-gray-200" for="type">@lang('status')</label>--}}
{{--                            <x-select id="status" wire:model="status">--}}
{{--                                <option value="">@lang('select status')</option>--}}
{{--                                <option value="active">@lang('active')</option>--}}
{{--                                <option value="inactive">@lang('inactive')</option>--}}
{{--                            </x-select>--}}
{{--                            @error('status')<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="flex items-center justify-between w-full mt-4">--}}
{{--                        <button type="button" @click="closeModal"--}}
{{--                                class="bg-red-600 focus:ring-gray-400 transition duration-150 text-white ease-in-out hover:bg-red-300 rounded px-8 py-2 text-sm">--}}
{{--                            Cancel--}}
{{--                        </button>--}}
{{--                        <button type="submit"--}}
{{--                                class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">--}}
{{--                            Submit--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    @script
    <script>
        Alpine.data('user', () => ({
            init() {
                $wire.on('dataAdded', (e) => {
                    // this.isOpen = false
                    this.editMode = false
                    element = document.getElementById(e.dataId)
                    if (element) {
                        console.log(element)
                        element.scrollIntoView({ behavior: 'smooth' });
                    }
                    setTimeout(() => {
                    @this.set('loadId', 0);
                    }, 5000)
                })
            },
            isOpen: false,
            editMode: false,
            rows: @entangle('selectedRows'),
            selectPage: @entangle('selectPageRows').live,
            toggleModal() {
                this.isOpen = !this.isOpen;
                this.$nextTick(() => {
                    this.$refs.inputName.focus()
                })
            },
            closeModal() {
                this.isOpen = false;
                this.editMode = false;
                $wire.resetData()
            },
            editModal(id) {
                this.$wire.loadData(id);
                this.isOpen = true;
                this.editMode = true;
            }
        }))
        document.addEventListener('delete', function (event) {
            itemId = event.detail.itemId
            actionName = event.detail.actionName
            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

            }).then((result) => {
                if (result.isConfirmed) {
                    $wire[actionName](itemId)
                }
            })
        });
    </script>
    @endscript
</div>
