<div class="h-full p-4" x-data="user()">
    @if(!$submitted)
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
    @endif
    <div class="text-center items-center flex justify-center">
        @if($submitted)

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
                <h2 class="text-xl font-bold">{{$true_ans}} out of {{$item_per_page}}</h2>
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
                        <span class="text-lg font-bold text-green-500">{{$true_ans}}</span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Correct Answers</span>
                        <span class="text-lg font-bold text-blue-500">{{$correct}}</span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Wrong Answers</span>
                        <span class="text-lg font-bold text-red-500">{{$wrong}}</span>
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
    </div>
    @if(!$submitted)
        @if(!$is_single_page)
            <div
                class="scrollbar-none after:inset-x-0 overflow-x-auto after:h-0.5 mt-2">
                <ol class="z-10 flex justify-between text-sm font-medium text-gray-500">
                    <template x-for="(stp, i) in ans">
                        <li class="flex items-center p-2">
                            <span :class="{'bg-green-600 text-white dark:bg-green-400': step==i+1}"
                                  class="w-6 h-6 text-[10px] font-bold leading-6 bg-gray-200 dark:text-white dark:bg-gray-500 text-center rounded-full"
                                  x-text="i+1">1</span>
                        </li>
                    </template>
                </ol>
            </div>
        @endif
        <div class="py-4 flex flex-col justify-start md:w-1/2 m-auto">
            @foreach($items as $i => $item)
                <div @if(!$is_single_page) x-cloak x-show="step=={{$i+1}}"
                     @endif class=" @if(!$is_mcq) md:flex md:gap-2 justify-between @endif border border-2 rounded-lg border-purple-400 p-3 my-2">
                    <legend class="text-lg font-medium my-1 text-gray-700 dark:text-gray-200" style="font-family: examplefont"><span>({{$i+1}})</span>
                        <span class="text-xl font-bangla">{{$item[$from]}}?</span></legend>
                    @if(!$is_mcq)
                        <input type="text" placeholder="" x-model="ans[{{$i}}]"
                               class="dark:bg-darker bg-gray-300 rounded-full px-2 py-1 text-lg font-bangla"/>
                    @else
                        <ul class="grid grid-cols-2 gap-4 text-sm">
                            @foreach($item->options($item, $practise, $from) as $j => $option)
                                <li>
                                    <label class="flex items-center text-sm">
                                        <input x-model="ans[{{$i}}]" value="{{$option[$practise]}}" type="radio"
                                               class="w-4 h-4 border border-gray-300 rounded-md"/>
                                        <span class="ml-3 text-md font-medium text-lg font-bangla">{{is_numeric($option[$practise])?number_format($option[$practise], 2):$option[$practise]}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
            <div class="grid grid-cols-3 justify-between capitalize gap-2 my-6">
                @if($is_single_page)
                    <button wire:loading.submit.remove @click="$wire.set('ans', ans),
                            $wire.submit(), clearInterval(counter)" wire:loading.submit.attr="disabled"
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
                    <button
                        wire:loading.submit.remove
{{--                        wire:loading.submit.class.add="animate-pulse" --}}
                        @click="$wire.set('ans', ans),
                            $wire.submit(), clearInterval(counter)" wire:loading.submit.attr="disabled">
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
        <div class="py-8 flex flex-col justify-start md:w-1/2 m-auto capitalize">
            @foreach($items as $i => $item)
                @php
                    if ($is_mcq){
                                $col = strtolower($item[$practise]);
                            $a = strtolower($ans[$i]);

                        if (strtolower($item[$practise]) === strtolower($ans[$i])){
                                        $is_true = true;
                        }else{
            $is_true = false;
                        }
                        }else{
                        $col = is_numeric($item[$practise])?strval(number_format($item[$practise])):strtolower($item[$practise]);
        $a = is_numeric($ans[$i])?strval(number_format($ans[$i])):strtolower($ans[$i]);
        $str1 = str_split(strtolower($col));
        $str2 = str_split(strtolower($a));
        $vowel = str_split('aeiouyh');
        $diff1 = array_diff($str1, $str2);
        $diff2 = array_diff($diff1, $vowel);
        if (strlen(implode($diff2))==0 && strlen($this->ans[$i])<13){
            $is_true = true;
        }else{
            $is_true = false;
        }
        }
                @endphp
                <div
                    class="border border-2 rounded-lg border-purple-400 p-3 my-2 {{$is_true?'bg-green-100 dark:bg-green-300':'bg-red-100 dark:bg-red-300'}} ">
                    <legend class="text-lg font-medium my-1 text-gray-800"><span>({{$i+1}})</span>
                        <span class="text-lg font-bangla"> {{$item[$from]}}?</span></legend>
                    <ul class="grid grid-cols-2 gap-4">
                        <li>
                            <label class="flex items-center text-sm">
{{--                                {{$col}} = {{$a}}--}}
                                <span class="ml-3 text-md font-medium text-gray-800">Your ans:
                                        <span
                                            class="{{$col === $a ?'text-green-600 dark:text-green-600':'text-pink-600'}} text-lg font-bangla">{{$ans[$i]?is_numeric($ans[$i])?number_format($ans[$i], 2):$ans[$i]:'no answer'}}</span>
                                    </span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center text-sm">
                                    <span class="ml-3 text-md font-medium text-gray-800">Correct ans:
                                        <span class="text-green-600 text-lg font-bangla">{{is_numeric($item[$practise])?number_format($item[$practise], 2):$item[$practise]}}</span>
                                    </span>
                            </label>
                        </li>
                    </ul>
                </div>
            @endforeach
            <center><a href="{{route('exam')}}?practise={{$practise}}" class="px-4 rounded-2xl py-2 bg-violet-500 text-white w-48">@lang('again')</a></center>
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
                            $wire.set('ans', this.ans);
                            $wire.submit()
                        }  }, 1000),
                        $wire.on('timeFinished', (e) => {
                            clearInterval(counter)
                        })
                },
                openTable: $persist('ot'),
                ans : @entangle('ans'),
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

