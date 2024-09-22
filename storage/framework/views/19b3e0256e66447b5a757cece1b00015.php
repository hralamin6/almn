
    <div class="h-full p-4" x-data="user()">

    <!--[if BLOCK]><![endif]--><?php if($quizCompleted): ?>

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
                <h2 class="text-xl font-bold"><?php echo e($correctAnswersCount-$negative); ?> out of <?php echo e($item_per_page); ?></h2>
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
                    <span class="text-lg font-bold text-green-500"><?php echo e($correctAnswersCount-$negative); ?></span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Correct Answers</span>
                    <span class="text-lg font-bold text-blue-500"><?php echo e($correctAnswersCount); ?></span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Wrong Answers</span>
                    <span class="text-lg font-bold text-red-500"><?php echo e($wrongAnswersCount); ?></span>
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
    <!--[if BLOCK]><![endif]--><?php if(!$quizCompleted): ?>
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
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>














                <div <?php if(!$is_single_page): ?> x-cloak x-show="step==<?php echo e($index+1); ?>"
                     <?php endif; ?> class=" <?php if(!$is_mcq): ?> md:flex md:gap-2 justify-between <?php endif; ?> border border-2 rounded-lg border-purple-400 p-3 my-2">
                    <legend class="text-lg font-medium my-1 text-gray-700 dark:text-gray-200" style="font-family: examplefont"><span>(<?php echo e($index+1); ?>)</span>
                        <span class="text-xl font-bangla"><?php echo e($question['question']); ?></span></legend>
                    <!--[if BLOCK]><![endif]--><?php if(!$is_mcq): ?>
                        <input type="text" placeholder="" x-model="ans[<?php echo e($index); ?>]"
                               class="dark:bg-darker bg-gray-300 rounded-full px-2 py-1 text-lg font-bangla"/>
                    <?php else: ?>
                        <ul class="grid grid-cols-2 gap-4 text-sm">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $question['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <label class="flex items-center text-sm">
                                        <input x-model="ans[<?php echo e($index); ?>]" value="<?php echo e($option); ?>" type="radio"
                                               class="w-4 h-4 border border-gray-300 rounded-md"/>
                                        <span class="ml-3 text-md font-medium text-lg font-bangla"><?php echo e($option); ?></span>
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
        <!-- Quiz Result Section -->
        <div class="mt-8 space-y-6">

            <!-- Show each question with user answer and correct answer -->
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $quizResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=> $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-md">
                    <h4 class="font-semibold text-lg"><?php echo e($result['question']); ?></h4>
                    <p class="text-sm">
                        <span class="font-bold">Your Answer:</span>
                        <span class="<?php echo e($result['status'] == 'correct' ? 'text-green-500' : ($result['status'] == 'incorrect' ? 'text-red-500' : 'text-gray-500')); ?>">
                            <?php echo e($result['user_answer'] ?? 'Skipped'); ?>

                        </span>
                    </p>
                    <p class="text-sm">
                        <span class="font-bold">Correct Answer:</span>
                        <span class="text-blue-500"><?php echo e($result['correct_answer']); ?></span>
                    </p>
                    <p class="text-sm">
                        <span class="font-bold">Status:</span>
                        <span class="<?php echo e($result['status'] == 'correct' ? 'text-green-500' : ($result['status'] == 'incorrect' ? 'text-red-500' : 'text-gray-500')); ?>">
                            <?php echo e(ucfirst($result['status'])); ?>

                        </span>
                    </p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php
        $__scriptKey = '4243983621-0';
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
                            $wire.set('selectedAnswers', this.ans);
                            $wire.submit()
                        }  }, 1000),
                        $wire.on('timeFinished', (e) => {
                            clearInterval(counter)
                        })
                },
                openTable: $persist('ot'),
                ans : <?php if ((object) ('selectedAnswers') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selectedAnswers'->value()); ?>')<?php echo e('selectedAnswers'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selectedAnswers'); ?>')<?php endif; ?>,
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
<?php /**PATH /home/hralamin/www/almn/resources/views/livewire/test-component.blade.php ENDPATH**/ ?>