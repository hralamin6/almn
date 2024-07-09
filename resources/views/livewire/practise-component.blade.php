<div>
    <center>

        <p class="text-2xl m-auto text-gray-600 dark:text-white">@lang('exam settings')</p>
    </center>
    <div class="flex flex-1 h-full p-4">
        <div class="m-2 md:w-1/2  items-center mx-auto text-sm dark:text-white capitalize">
            <div class="grid grid-cols-2  justify-between gap-2  capitalize my-3">
                <label for="is_single_page">@lang('question pattern')</label>
                <x-select wire:model.live="is_single_page" class="select border border-indigo-400 dark:bg-gray-600 dark:bg-gray-600 text-sm select-sm text-sm select-sm max-w-xs">
                    <option disabled selected>@lang('choose question patern')</option>
                    <option value="1">@lang('In a single page')</option>
                    <option value="0">@lang('one question per page')</option>
                </x-select>
            </div>

            <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                <label for="is_single_page">@lang('question number')</label>
                <x-select wire:model.live="q_number" class="select border border-indigo-400 dark:bg-gray-600 text-sm select-sm  max-w-xs">
                    <option disabled selected>@lang('question amount')</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </x-select>
            </div>
            <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                <label for="is_single_page">@lang('time per question')</label>
                <x-select wire:model.live="q_time" class="select border border-indigo-400 dark:bg-gray-600 text-sm select-sm  max-w-xs">
                    <option disabled selected>@lang('time per question')</option>
                    <option value="10">10 sec</option>
                    <option value="15">15 sec</option>
                    <option value="30">30 sec</option>
                    <option value="45">45 sec</option>
                    <option value="60">60 sec</option>
                </x-select>
            </div>
            <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                <label for="is_single_page">@lang('result system')</label>
                <x-select wire:model.live="is_minus" class="select border border-indigo-400 dark:bg-gray-600 text-sm select-sm  max-w-xs">
                    <option disabled selected>>@lang('result system')</option>
                    <option value="1">@lang('Minus for wrong ans.')</option>
                    <option value="0">@lang('No minus for wrong ans.')</option>
                </x-select>
            </div>
            <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                <label for="is_single_page">@lang('question type')</label>
                <div class="flex justify-between space-x-2">
                    <div>
                        <label for="MCQ">@lang('MCQ')</label>
                        <input type="radio" wire:model.live="is_mcq" value="1" id="MCQ">
                    </div>
                    <div>
                        <label for="question">@lang('question')</label>
                        <input type="radio" wire:model.live="is_mcq" value="0" id="question">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                <label for="is_single_page">@lang('words factory')</label>
                <div class="flex justify-between space-x-2">
                    <div>
                        <label for="my_words">@lang('my words')</label>
                        <input type="radio" wire:model.live="is_my_words" value="1" id="my_words">
                    </div>
                    <div>
                        <label for="all_words">@lang('all words')</label>
                        <input type="radio" wire:model.live="is_my_words" value="0" id="all_words">
                    </div>
                </div>
            </div>

        @auth
                <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                    <label for="is_single_page">@lang('wishlist only')</label>
                    <div class="flex justify-between space-x-2">
                        <div>
                            <label for="male">@lang('yes')</label>
                            <input type="radio" wire:model.live="isWishlist" value="1" id="male">
                        </div>
                        <div>
                            <label for="female">@lang('no')</label>
                            <input type="radio" wire:model.live="isWishlist" value="0" id="female">

                        </div>

                    </div>

                </div>
                <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                    <label for="is_single_page">@lang('want to save exam?')</label>
                    <div class="flex justify-between space-x-2">
                        <div>
                            <label for="yes">@lang('yes')</label>
                            <input type="radio" wire:model.live="isSave" value="1" id="yes">
                        </div>
                        <div>
                            <label for="no">@lang('no')</label>
                            <input type="radio" wire:model.live="isSave" value="0" id="no">

                        </div>

                    </div>

                </div>
                <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                    <label for="is_single_page">@lang('Add wrong/skipped to wishlist?')</label>
                    <div class="flex justify-between space-x-2">
                        <div>
                            <label for="yes">@lang('yes')</label>
                            <input type="radio" wire:model.live="isToWishlist" value="1" id="yes">
                        </div>
                        <div>
                            <label for="no">@lang('no')</label>
                            <input type="radio" wire:model.live="isToWishlist" value="0" id="no">

                        </div>

                    </div>

                </div>
            @endauth
            {{--        <button class="btn btn-outline btn-primary btn-sm text-sm" wire:target="startPractise" wire:click.prevent="startPractise" wire:loading.class.add="loading">Save</button>--}}

            <a href="{{route('exam')}}?practise=meaning&from=name" wire:navigate class="m-1 bg-gradient-to-r from-red-500 to-green-500 flex gap-x-3 text-sm capitalize sm:text-base items-center justify-center text-white rounded-lg hover:bg-[#1877F2]/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                <span>@lang('word to meaning')</span>
            </a>
            <a href="{{route('exam')}}?practise=name&from=meaning" wire:navigate class="m-1 bg-gradient-to-r from-green-500 to-red-500 flex gap-x-3 text-sm capitalize sm:text-base items-center justify-center text-white rounded-lg hover:bg-[#1877F2]/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                <span>@lang('meaning to word')</span>
            </a>
            <a href="{{route('exam')}}?practise=pop&from=meaning" wire:navigate class="m-1 bg-gradient-to-r from-purple-500 to-pink-500 flex gap-x-3 text-sm capitalize sm:text-base items-center justify-center text-white rounded-lg hover:bg-[#1877F2]/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                <span>@lang('meaning to parts of speech')</span>
            </a>
            <a href="{{route('exam')}}?practise=meaning&from=pop" wire:navigate class="m-1 bg-gradient-to-r from-purple-500 to-pink-500 flex gap-x-3 text-sm capitalize sm:text-base items-center justify-center text-white rounded-lg hover:bg-[#1877F2]/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                <span>@lang('parts of speech to meaning')</span>
            </a>
        </div>

    </div>

</div>
