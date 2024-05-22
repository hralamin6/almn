<div class="mx-4" x-data="quiz()">
    @if(!$quiz)

        @foreach($items as $i=>  $item)

            @php
            $greeting = '';

            $persantage = $item->result*100/$item->count;
            if ($persantage >= 95) {
    $greeting = 'বাঃ, কী অসাধারণ ফলাফল!';
  } elseif ($persantage >= 80) {
    $greeting = 'চেষ্টার ফল সুন্দর হলো!';
  } elseif ($persantage  >= 60) {
    $greeting = 'ফলাফল যাই হোক, চেষ্টাটাই তো বড় কথা!';
  } else {
    $greeting = 'মন খারাপ করো না. পরেরবার আরো ভালো করবে!';
  }
  @endphp
            <div wire:key="{{$i}}" class="flex md:w-1/2 mx-auto mt-2 flex-col dark:text-white text-gray-600 rounded shadow-md p-4 dark:bg-darker bg-gray-200">

               @can('isAdmin')
                    <div class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                    <img class="w-12 h-12 rounded-full mr-4 object-cover" src="{{$item->user->getFirstMediaUrl('default')}}" alt="">
                    <div class="text-left">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{$item->user->name}}</h3>
                    </div>
                </div>
                @endcan
                <div class="flex justify-between items-center capitalize mb-2">
                    <h2 class="text-xl font-bold">{{$item->title}}</h2>
                    <button
                        @click.prevent="$dispatch('delete', { title: 'Are you sure to delete', text: 'You will loss this data forever', icon: 'error',actionName: 'deleteSingle', itemId: {{$item->id}} })"
                        class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                        <x-h-o-trash class="text-red-400"/>
                    </button>
                    <span class="text-sm text-gray-400">Created:  {{\Illuminate\Support\Carbon::parse($item['created_at'])->diffForHumans()}}</span>
                </div>
                <div class="text-lg font-bold text-indigo-600 dark:text-indigo-400 mb-4">
                    {{$greeting}}
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Total Question</span>
                        <span class="text-lg font-bold text-green-500">{{$item->count}}</span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Score</span>
                        <span class="text-lg font-bold text-green-500">{{$item->result}}</span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Correct Answers</span>
                        <span class="text-lg font-bold text-blue-500">{{$item->correct}}</span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Wrong Answers</span>
                        <span class="text-lg font-bold text-red-500">{{$item->wrong}}</span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Skipped</span>
                        <span class="text-lg font-bold text-yellow-500">{{$item->skipped}}</span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Negative mark</span>
                        <span class="text-lg font-bold text-purple-500">{{$item->is_minus}}</span>
                    </div>
                </div>
                <button wire:click="$set('quizId', {{$item->id}})" class="w-full py-2 mt-2 px-4 bg-indigo-600 dark:bg-indigo-500 text-white rounded-md hover:bg-indigo-700 dark:hover:bg-indigo-600 transition-colors duration-300">
                    Show details
                </button>
            </div>

@endforeach
            <div class="mx-auto my-4 px-4 overflow-y-auto">
                {{ $items->links() }}
                {{--            {{ $items->links() }}--}}
            </div>
    @else
        @php
            $greeting = '';

            $persantage = $quiz->result*100/$quiz->count;
            if ($persantage >= 95) {
    $greeting = 'বাঃ, কী অসাধারণ ফলাফল!';
  } elseif ($persantage >= 80) {
    $greeting = 'চেষ্টার ফল সুন্দর হলো!';
  } elseif ($persantage  >= 60) {
    $greeting = 'ফলাফল যাই হোক, চেষ্টাটাই তো বড় কথা!';
  } else {
    $greeting = 'মন খারাপ করো না. পরেরবার আরো ভালো করবে!';
  }
        @endphp

        <div class="flex md:w-1/2 mx-auto mt-2 flex-col dark:text-white text-gray-600 rounded shadow-md p-4 dark:bg-darker bg-gray-200">
           @can('isAdmin')
            <div class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                <img class="w-12 h-12 rounded-full mr-4 object-cover" src="{{$quiz->user->getFirstMediaUrl('default')}}" alt="">
                <div class="text-left">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{$quiz->user->name}}</h3>
                </div>
            </div>
            @endcan
            <div class="flex justify-between items-center capitalize mb-2">
                <h2 class="text-xl font-bold">{{$quiz->title}}</h2>
                <button
                    @click.prevent="$dispatch('delete', { title: 'Are you sure to delete', text: 'You will loss this data forever', icon: 'error',actionName: 'deleteSingle', itemId: {{$quiz->id}} })"
                    class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                    <x-h-o-trash class="text-red-400"/>
                </button>
                <span class="text-sm text-gray-400">Created:  {{\Illuminate\Support\Carbon::parse($quiz['created_at'])->diffForHumans()}}</span>
            </div>
            <div class="text-lg font-bold text-indigo-600 dark:text-indigo-400 mb-4">
                {{$greeting}}
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Total Question</span>
                    <span class="text-lg font-bold text-green-500">{{$quiz->count}}</span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Score</span>
                    <span class="text-lg font-bold text-green-500">{{$quiz->result}}</span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Correct Answers</span>
                    <span class="text-lg font-bold text-blue-500">{{$quiz->correct}}</span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Wrong Answers</span>
                    <span class="text-lg font-bold text-red-500">{{$quiz->wrong}}</span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Skipped</span>
                    <span class="text-lg font-bold text-yellow-500">{{$quiz->skipped}}</span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Negative mark</span>
                    <span class="text-lg font-bold text-purple-500">{{$quiz->is_munis}}</span>
                </div>
            </div>
{{--            <button wire:click="$set('quizId', {{$quiz->id}})" class="w-full py-2 mt-2 px-4 bg-indigo-600 dark:bg-indigo-500 text-white rounded-md hover:bg-indigo-700 dark:hover:bg-indigo-600 transition-colors duration-300">--}}
{{--                Show details--}}
{{--            </button>--}}
        </div>

        <div class="py-2 flex flex-col justify-start md:w-1/2 m-auto capitalize">

        @foreach($quiz->questions as $i=>  $item)

        <div
            class="border hover:shadow-2xl border-2 rounded-lg border-purple-400 p-3 my-2 {{$item->status=='correct'?'bg-green-100 dark:bg-green-300':'bg-red-100 dark:bg-red-300'}} ">
            <legend class="text-lg font-medium my-1 text-gray-800"><span>({{$i+1}})</span> {{$item->title}}</legend>
            <ul class="grid grid-cols-2 gap-4">
                <li>
                    <label class="flex items-center text-sm">
                        <span class="ml-3 text-md font-medium text-gray-800">Your ans:
                                        <span
                                            class="{{$item->status=='correct' ?'text-green-600 dark:text-green-600':'text-pink-600'}}">{{$item->user_answer?is_numeric($item->user_answer)?number_format($item->user_answer, 2):$item->user_answer:'no answer'}}</span>
                                    </span>
                    </label>
                </li>
                <li>
                    <label class="flex items-center text-sm">
                                    <span class="ml-3 text-md font-medium text-gray-800">Correct ans:
                                        <span class="text-green-600">{{is_numeric($item->answer)?number_format($item->answer, 2):$item->answer}}</span>
                                    </span>
                    </label>
                </li>
            </ul>
        </div>
        @endforeach
        </div>
    <center>
        <a href="{{route('quizzes')}}"
           class="m-2 flex w-48 items-center px-3 py-1 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            <i class='bx bx-arrow-back bx-fade-left text-lg mx-1' ></i>
            <span class="mx-1">@lang('back to quizzes')</span>
        </a>
    </center>
    @endif

        @script
        <script>
            Alpine.data('quiz', () => ({
                init() {
                    $wire.on('dataAdded', (e) => {
                        this.isOpen = false
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
