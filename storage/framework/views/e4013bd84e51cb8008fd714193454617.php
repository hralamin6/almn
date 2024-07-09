<div class="h-full p-4" x-data="user()">
    <!--[if BLOCK]><![endif]--><?php if(!$submitted): ?>
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
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <div class="text-center items-center flex justify-center">
        <!--[if BLOCK]><![endif]--><?php if($submitted): ?>

            <?php
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
            ?>

            <div class="flex md:w-1/2 mx-auto mt-2 flex-col dark:text-white text-gray-600 rounded shadow-md p-4 dark:bg-darker bg-gray-200">
                <center>
                <h2 class="text-xl font-bold"><?php echo e($true_ans); ?> out of <?php echo e($item_per_page); ?></h2>
                </center>
                <div class="text-lg font-bold text-indigo-600 dark:text-indigo-400 mb-4">
                    <?php echo e($greeting); ?>

                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Total Question</span>
                        <span class="text-lg font-bold text-green-500"><?php echo e($item_per_page); ?></span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Score</span>
                        <span class="text-lg font-bold text-green-500"><?php echo e($true_ans); ?></span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Correct Answers</span>
                        <span class="text-lg font-bold text-blue-500"><?php echo e($correct); ?></span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Wrong Answers</span>
                        <span class="text-lg font-bold text-red-500"><?php echo e($wrong); ?></span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Skipped</span>
                        <span class="text-lg font-bold text-yellow-500"><?php echo e($skipped); ?></span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Negative mark</span>
                        <span class="text-lg font-bold text-purple-500"><?php echo e($negative); ?></span>
                    </div>
                </div>
                
                
                
            </div>


        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <!--[if BLOCK]><![endif]--><?php if(!$submitted): ?>
        <!--[if BLOCK]><![endif]--><?php if(!$is_single_page): ?>
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
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <div class="py-4 flex flex-col justify-start md:w-1/2 m-auto">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div <?php if(!$is_single_page): ?> x-cloak x-show="step==<?php echo e($i+1); ?>"
                     <?php endif; ?> class=" <?php if(!$is_mcq): ?> md:flex md:gap-2 justify-between <?php endif; ?> border border-2 rounded-lg border-purple-400 p-3 my-2">
                    <legend class="text-lg font-medium my-1 text-gray-700 dark:text-gray-200" style="font-family: examplefont"><span>(<?php echo e($i+1); ?>)</span>
                        <span class="text-xl font-bangla"><?php echo e($item[$from]); ?>?</span></legend>
                    <!--[if BLOCK]><![endif]--><?php if(!$is_mcq): ?>
                        <input type="text" placeholder="" x-model="ans[<?php echo e($i); ?>]"
                               class="dark:bg-darker bg-gray-300 rounded-full px-2 py-1 text-lg font-bangla"/>
                    <?php else: ?>
                        <ul class="grid grid-cols-2 gap-4 text-sm">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $item->options($item, $practise, $from); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <label class="flex items-center text-sm">
                                        <input x-model="ans[<?php echo e($i); ?>]" value="<?php echo e($option[$practise]); ?>" type="radio"
                                               class="w-4 h-4 border border-gray-300 rounded-md"/>
                                        <span class="ml-3 text-md font-medium text-lg font-bangla"><?php echo e(is_numeric($option[$practise])?number_format($option[$practise], 2):$option[$practise]); ?></span>
                                    </label>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </ul>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <div class="grid grid-cols-3 justify-between capitalize gap-2 my-6">
                <!--[if BLOCK]><![endif]--><?php if($is_single_page): ?>
                    <button wire:loading.submit.class.add="animate-pulse" @click="time=1" wire:loading.submit.attr="disabled"
                             class="px-4 py-2 capitalize bg-white mx-auto dark:bg-darker dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-300 transition-colors border px-4 py-2">
                        <?php echo app('translator')->get('submit'); ?>
                    </button>
                <?php else: ?>
                    <button x-cloak x-show="step>1" @click="step>1?step--:''" type="button"
                            :class="{'cursor-not-allowed':step<2}" class="px-4 py-2 capitalize bg-white mx-auto dark:bg-darker dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-300 justify-self-start">
                        <?php echo app('translator')->get('prev'); ?>
                    </button>
                    <button x-cloak x-show="step==itemPerPage"
                            class="px-4 py-2 capitalize bg-white mx-auto dark:bg-darker dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-300 col-start-3 justify-self-end"
                    <button wire:loading.submit.class.add="animate-pulse" @click="time=1" wire:loading.submit.attr="disabled">
                        <?php echo app('translator')->get('submit'); ?>
                    </button>
                    <button x-cloak x-show="step<itemPerPage" @click="step<itemPerPage?step++:''"
                            :class="{'cursor-not-allowed':step==itemPerPage}" type="button"
                            class="px-4 py-2 capitalize bg-white mx-auto dark:bg-darker dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-300 col-start-3 justify-self-end">
                        <?php echo app('translator')->get('next'); ?>
                    </button>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    <?php else: ?>
        <div class="py-8 flex flex-col justify-start md:w-1/2 m-auto capitalize">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
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
                ?>
                <div
                    class="border border-2 rounded-lg border-purple-400 p-3 my-2 <?php echo e($is_true?'bg-green-100 dark:bg-green-300':'bg-red-100 dark:bg-red-300'); ?> ">
                    <legend class="text-lg font-medium my-1 text-gray-800"><span>(<?php echo e($i+1); ?>)</span>
                        <span class="text-lg font-bangla"> <?php echo e($item[$from]); ?>?</span></legend>
                    <ul class="grid grid-cols-2 gap-4">
                        <li>
                            <label class="flex items-center text-sm">

                                <span class="ml-3 text-md font-medium text-gray-800">Your ans:
                                        <span
                                            class="<?php echo e($col === $a ?'text-green-600 dark:text-green-600':'text-pink-600'); ?> text-lg font-bangla"><?php echo e($ans[$i]?is_numeric($ans[$i])?number_format($ans[$i], 2):$ans[$i]:'no answer'); ?></span>
                                    </span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center text-sm">
                                    <span class="ml-3 text-md font-medium text-gray-800">Correct ans:
                                        <span class="text-green-600 text-lg font-bangla"><?php echo e(is_numeric($item[$practise])?number_format($item[$practise], 2):$item[$practise]); ?></span>
                                    </span>
                            </label>
                        </li>
                    </ul>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <center><a href="<?php echo e(route('exam')); ?>?practise=<?php echo e($practise); ?>" class="px-4 rounded-2xl py-2 bg-violet-500 text-white w-48"><?php echo app('translator')->get('again'); ?></a></center>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php
        $__scriptKey = '3996615415-0';
        ob_start();
    ?>
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
                ans : <?php if ((object) ('ans') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('ans'->value()); ?>')<?php echo e('ans'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('ans'); ?>')<?php endif; ?>,
                time : <?php echo e($item_per_page*$time_per_question); ?>,
                itemPerPage : <?php echo e($item_per_page); ?>,
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
            <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
</div>

<?php /**PATH /home/hralamin/www/almn/resources/views/livewire/exam-component.blade.php ENDPATH**/ ?>