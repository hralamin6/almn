<div class="flex items-center justify-center flex-1 h-full p-4">
<div class="m-2 md:w-1/2  items-center m-auto text-sm dark:text-white">
        <div class="grid grid-cols-2  justify-between gap-2  capitalize my-3">
            <label for="is_single_page">question pattern</label>
            <select wire:model.live="is_single_page" class="select border border-indigo-400 dark:bg-gray-600 dark:bg-gray-600 text-xs select-sm text-xs select-sm max-w-xs">
                <option disabled selected>Q. pattern</option>
                <option value="1">In a single page</option>
                <option value="0">One Q. per page</option>
            </select>
        </div>

        <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
            <label for="is_single_page">question number</label>
            <select wire:model.live="q_number" class="select border border-indigo-400 dark:bg-gray-600 text-xs select-sm  max-w-xs">
                <option disabled selected>Q. number</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
            <label for="is_single_page">time per question</label>
            <select wire:model.live="q_time" class="select border border-indigo-400 dark:bg-gray-600 text-xs select-sm  max-w-xs">
                <option disabled selected>Time per Q.</option>
                <option value="10">10 sec</option>
                <option value="15">15 sec</option>
                <option value="30">30 sec</option>
                <option value="45">45 sec</option>
                <option value="60">60 sec</option>
            </select>
        </div>
        <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
            <label for="is_single_page">result system</label>
            <select wire:model.live="is_minus" class="select border border-indigo-400 dark:bg-gray-600 text-xs select-sm  max-w-xs">
                <option disabled selected>Result system</option>
                <option value="1">Minus for wrong ans.</option>
                <option value="0">No Minus for wrong ans.</option>
            </select>
        </div>
        <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
            <label for="is_single_page">question type</label>
            <select wire:model.live="is_mcq" class="select border border-indigo-400 dark:bg-gray-600 text-xs select-sm  max-w-xs">
                <option disabled selected>Result system</option>
                <option value="0">question answer</option>
                <option value="1">multiple choice question</option>
            </select>
        </div>
        {{--        <button class="btn btn-outline btn-primary btn-sm text-xs" wire:target="startPractise" wire:click.prevent="startPractise" wire:loading.class.add="loading">Save</button>--}}

        <a href="{{route('exam')}}?practise=name" wire:navigate class="px-2 py-1 text-2xl text-pink-50 rounded-xl justify-center mt-4 text-center bg-green-600">@lang('Start now')</a>
    </div>
{{--    <div class="grid grid-cols-2 justify-between md:grid-cols-2 gap-6">--}}
{{--        @foreach(\Illuminate\Support\Facades\Schema::getColumnListing('words') as $i=> $col)--}}
{{--            @if($col!='summary' && $col!='discovered_by' && $col!='source' && $col!='created_at' && $col!='updated_at' && $col!='id')--}}
{{--                <a class="btn btn-outline btn-primary btn-sm capitalize dark:text-pink-400" href="{{route('exam')}}?practise={{$col}}">@lang('meaning to') {{$col}}</a>--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--    </div>--}}
</div>
