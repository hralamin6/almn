{{--<div class="container mx-auto p-6 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-xl shadow-lg">--}}
    <div class="h-full p-4" x-data="user()">

    @if($quizCompleted)

        @php
            $greeting = '';

            $persantage = $true_ans*100/$item_per_page;
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
            <center>
                <h2 class="text-xl font-bold">{{$correctAnswersCount-$negative}} out of {{$item_per_page}}</h2>
            </center>
            <div class="text-lg font-bold text-indigo-600 dark:text-indigo-400 mb-4">
                {{$greeting}}
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Total Question</span>
                    <span class="text-lg font-bold text-green-500">{{$item_per_page}}</span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Score</span>
                    <span class="text-lg font-bold text-green-500">{{$correctAnswersCount-$negative}}</span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Correct Answers</span>
                    <span class="text-lg font-bold text-blue-500">{{$correctAnswersCount}}</span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Wrong Answers</span>
                    <span class="text-lg font-bold text-red-500">{{$wrongAnswersCount}}</span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Skipped</span>
                    <span class="text-lg font-bold text-yellow-500">{{$skipped}}</span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Negative mark</span>
                    <span class="text-lg font-bold text-purple-500">{{$negative}}</span>
                </div>
            </div>
            {{--            <button wire:click="$set('quizId', {{$quiz->id}})" class="w-full py-2 mt-2 px-4 bg-indigo-600 dark:bg-indigo-500 text-white rounded-md hover:bg-indigo-700 dark:hover:bg-indigo-600 transition-colors duration-300">--}}
            {{--                Show details--}}
            {{--            </button>--}}
        </div>


    @endif
    @if(!$quizCompleted)
            <div class="mx-auto text-center">
            <span class="countdown font-mono text-2xl">
                <span x-text="hours" :style="`--value:${hours}`"></span>:
                <span x-text="minutes" :style="`--value:${minutes}`"></span>:
                <span x-text="seconds" :class="{'text-red-600': seconds<10}" :style="`--value:${seconds}`"></span>
           </span>
            </div>
            <div class="rounded-lg w-72 shadow block m-auto">
                <div class="w-full items-center gap-2 h-4 bg-gray-400 rounded-full">
                    <div :style="`width: ${percentage}%; background:hsl(${progress.toFixed(0)},100%,50%)`"
                         class="w-3/4 h-full text-center text-xs text-white rounded-full"></div>
                </div>
            </div>
            <div class="py-4 flex flex-col justify-start md:w-1/2 m-auto">
            @foreach($questions as $index => $question)
{{--                <div class="question bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-md">--}}
{{--                    <h4 class="font-bold text-xl mb-4">{{ $question['question'] }}</h4>--}}
{{--                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">--}}
{{--                        @foreach($question['options'] as $option)--}}
{{--                            <label class="flex items-center space-x-3 bg-gray-100 dark:bg-gray-600 p-3 rounded-lg shadow hover:bg-blue-50 dark:hover:bg-blue-900 transition duration-150 ease-in-out">--}}
{{--                                <input type="radio" wire:model="selectedAnswers.{{ $index }}" value="{{ $option }}"--}}
{{--                                       class="form-radio h-4 w-4 text-blue-600 dark:text-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50 rounded-full">--}}
{{--                                <span class="text-sm font-medium">{{ $option }}</span>--}}
{{--                            </label>--}}

{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div @if(!$is_single_page) x-cloak x-show="step=={{$index+1}}"
                     @endif class=" @if(!$is_mcq) md:flex md:gap-2 justify-between @endif border border-2 rounded-lg border-purple-400 p-3 my-2">
                    <legend class="text-lg font-medium my-1 text-gray-700 dark:text-gray-200" style="font-family: examplefont"><span>({{$index+1}})</span>
                        <span class="text-xl font-bangla">{{ $question['question'] }}</span></legend>
                    @if(!$is_mcq)
                        <input type="text" placeholder="" x-model="ans[{{$index}}]"
                               class="dark:bg-darker bg-gray-300 rounded-full px-2 py-1 text-lg font-bangla"/>
                    @else
                        <ul class="grid grid-cols-2 gap-4 text-sm">
                            @foreach($question['options'] as $option)
                                <li>
                                    <label class="flex items-center text-sm">
                                        <input x-model="ans[{{$index}}]" value="{{ $option }}" type="radio"
                                               class="w-4 h-4 border border-gray-300 rounded-md"/>
                                        <span class="ml-3 text-md font-medium text-lg font-bangla">{{ $option }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach

                <div class="grid grid-cols-3 justify-between capitalize gap-2 my-6">
                    @if($is_single_page)
                        <button wire:loading.submit.class.add="animate-pulse" @click="time=1" wire:loading.submit.attr="disabled"
                                class="px-4 py-2 capitalize bg-white mx-auto dark:bg-darker dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-300 transition-colors border px-4 py-2">
                            @lang('submit')
                        </button>
                    @else
                        <button x-cloak x-show="step>1" @click="step>1?step--:''" type="button"
                                :class="{'cursor-not-allowed':step<2}" class="px-4 py-2 capitalize bg-white mx-auto dark:bg-darker dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-300 justify-self-start">
                            @lang('prev')
                        </button>
                        <button x-cloak x-show="step==itemPerPage"
                                class="px-4 py-2 capitalize bg-white mx-auto dark:bg-darker dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-300 col-start-3 justify-self-end"
                        <button wire:loading.submit.class.add="animate-pulse" @click="time=1" wire:loading.submit.attr="disabled">
                            @lang('submit')
                        </button>
                        <button x-cloak x-show="step<itemPerPage" @click="step<itemPerPage?step++:''"
                                :class="{'cursor-not-allowed':step==itemPerPage}" type="button"
                                class="px-4 py-2 capitalize bg-white mx-auto dark:bg-darker dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-300 col-start-3 justify-self-end">
                            @lang('next')
                        </button>
                    @endif
                </div>
        </div>
    @else
        <!-- Quiz Result Section -->
        <div class="mt-8 space-y-6">

            <!-- Show each question with user answer and correct answer -->
            @foreach($quizResults as $i=> $result)
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-md">
                    <h4 class="font-semibold text-lg">{{ $result['question'] }}</h4>
                    <p class="text-sm">
                        <span class="font-bold">Your Answer:</span>
                        <span class="{{ $result['status'] == 'correct' ? 'text-green-500' : ($result['status'] == 'incorrect' ? 'text-red-500' : 'text-gray-500') }}">
                            {{ $result['user_answer'] ?? 'Skipped' }}
                        </span>
                    </p>
                    <p class="text-sm">
                        <span class="font-bold">Correct Answer:</span>
                        <span class="text-blue-500">{{ $result['correct_answer'] }}</span>
                    </p>
                    <p class="text-sm">
                        <span class="font-bold">Status:</span>
                        <span class="{{ $result['status'] == 'correct' ? 'text-green-500' : ($result['status'] == 'incorrect' ? 'text-red-500' : 'text-gray-500') }}">
                            {{ ucfirst($result['status']) }}
                        </span>
                    </p>
                </div>
            @endforeach
        </div>
    @endif
        @script
        <script>
            Alpine.data('user', () => ({
                init() {
                    full_time = this.time;
                    set_time = this.time*1000;
                    counter = setInterval(() => {
                        this.time--
                        past_time = full_time-this.time;
                        this.seconds = this.format(this.time % 60);
                        this.percentage = past_time*100/full_time;
                        this.progress = 100-this.percentage;
                        this.minutes = this.format(this.time / 60 % 60);
                        this.hours = this.format(this.time / 3600 % 24);
                        if(this.time<=0){
                            clearInterval(counter);
                            $wire.set('selectedAnswers', this.ans);
                            $wire.submit()
                        }  }, 1000),
                        $wire.on('timeFinished', (e) => {
                            clearInterval(counter)
                        })
                },
                openTable: $persist('ot'),
                ans : @entangle('selectedAnswers'),
                time : {{$item_per_page*$time_per_question}},
                itemPerPage : {{$item_per_page}},
                step : 1,
                progress : 0,
                now: new Date().getTime(),
                seconds: 00,
                minutes: 00,
                hours: 00,
                percentage: 00,

                format: function (value){
                    if (value<10){
                        return '0' + Math.floor(value);
                    }else{
                        return Math.floor(value);
                    }
                }

            }))
        </script>
        @endscript
</div>
