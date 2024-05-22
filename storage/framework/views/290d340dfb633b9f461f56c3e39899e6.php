<div class="mx-4" x-data="quiz()">
    <!--[if BLOCK]><![endif]--><?php if(!$quiz): ?>

        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>  $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php
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
  ?>
            <div wire:key="<?php echo e($i); ?>" class="flex md:w-1/2 mx-auto mt-2 flex-col dark:text-white text-gray-600 rounded shadow-md p-4 dark:bg-darker bg-gray-200">

               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                    <div class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                    <img class="w-12 h-12 rounded-full mr-4 object-cover" src="<?php echo e($item->user->getFirstMediaUrl('default')); ?>" alt="">
                    <div class="text-left">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white"><?php echo e($item->user->name); ?></h3>
                    </div>
                </div>
                <?php endif; ?>
                <div class="flex justify-between items-center capitalize mb-2">
                    <h2 class="text-xl font-bold"><?php echo e($item->title); ?></h2>
                    <button
                        @click.prevent="$dispatch('delete', { title: 'Are you sure to delete', text: 'You will loss this data forever', icon: 'error',actionName: 'deleteSingle', itemId: <?php echo e($item->id); ?> })"
                        class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-red-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    </button>
                    <span class="text-sm text-gray-400">Created:  <?php echo e(\Illuminate\Support\Carbon::parse($item['created_at'])->diffForHumans()); ?></span>
                </div>
                <div class="text-lg font-bold text-indigo-600 dark:text-indigo-400 mb-4">
                    <?php echo e($greeting); ?>

                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Total Question</span>
                        <span class="text-lg font-bold text-green-500"><?php echo e($item->count); ?></span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Score</span>
                        <span class="text-lg font-bold text-green-500"><?php echo e($item->result); ?></span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Correct Answers</span>
                        <span class="text-lg font-bold text-blue-500"><?php echo e($item->correct); ?></span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Wrong Answers</span>
                        <span class="text-lg font-bold text-red-500"><?php echo e($item->wrong); ?></span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Skipped</span>
                        <span class="text-lg font-bold text-yellow-500"><?php echo e($item->skipped); ?></span>
                    </div>
                    <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                        <span class="text-sm font-medium">Negative mark</span>
                        <span class="text-lg font-bold text-purple-500"><?php echo e($item->is_minus); ?></span>
                    </div>
                </div>
                <button wire:click="$set('quizId', <?php echo e($item->id); ?>)" class="w-full py-2 mt-2 px-4 bg-indigo-600 dark:bg-indigo-500 text-white rounded-md hover:bg-indigo-700 dark:hover:bg-indigo-600 transition-colors duration-300">
                    Show details
                </button>
            </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <div class="mx-auto my-4 px-4 overflow-y-auto">
                <?php echo e($items->links()); ?>

                
            </div>
    <?php else: ?>
        <?php
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
        ?>

        <div class="flex md:w-1/2 mx-auto mt-2 flex-col dark:text-white text-gray-600 rounded shadow-md p-4 dark:bg-darker bg-gray-200">
           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
            <div class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                <img class="w-12 h-12 rounded-full mr-4 object-cover" src="<?php echo e($quiz->user->getFirstMediaUrl('default')); ?>" alt="">
                <div class="text-left">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white"><?php echo e($quiz->user->name); ?></h3>
                </div>
            </div>
            <?php endif; ?>
            <div class="flex justify-between items-center capitalize mb-2">
                <h2 class="text-xl font-bold"><?php echo e($quiz->title); ?></h2>
                <button
                    @click.prevent="$dispatch('delete', { title: 'Are you sure to delete', text: 'You will loss this data forever', icon: 'error',actionName: 'deleteSingle', itemId: <?php echo e($quiz->id); ?> })"
                    class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-red-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                </button>
                <span class="text-sm text-gray-400">Created:  <?php echo e(\Illuminate\Support\Carbon::parse($quiz['created_at'])->diffForHumans()); ?></span>
            </div>
            <div class="text-lg font-bold text-indigo-600 dark:text-indigo-400 mb-4">
                <?php echo e($greeting); ?>

            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Total Question</span>
                    <span class="text-lg font-bold text-green-500"><?php echo e($quiz->count); ?></span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Score</span>
                    <span class="text-lg font-bold text-green-500"><?php echo e($quiz->result); ?></span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Correct Answers</span>
                    <span class="text-lg font-bold text-blue-500"><?php echo e($quiz->correct); ?></span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Wrong Answers</span>
                    <span class="text-lg font-bold text-red-500"><?php echo e($quiz->wrong); ?></span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Skipped</span>
                    <span class="text-lg font-bold text-yellow-500"><?php echo e($quiz->skipped); ?></span>
                </div>
                <div class="flex items-center justify-between px-2 py-1 rounded dark:bg-gray-700 bg-gray-300 hover:shadow-xl">
                    <span class="text-sm font-medium">Negative mark</span>
                    <span class="text-lg font-bold text-purple-500"><?php echo e($quiz->is_munis); ?></span>
                </div>
            </div>



        </div>

        <div class="py-2 flex flex-col justify-start md:w-1/2 m-auto capitalize">

        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>  $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div
            class="border hover:shadow-2xl border-2 rounded-lg border-purple-400 p-3 my-2 <?php echo e($item->status=='correct'?'bg-green-100 dark:bg-green-300':'bg-red-100 dark:bg-red-300'); ?> ">
            <legend class="text-lg font-medium my-1 text-gray-800"><span>(<?php echo e($i+1); ?>)</span> <?php echo e($item->title); ?></legend>
            <ul class="grid grid-cols-2 gap-4">
                <li>
                    <label class="flex items-center text-sm">
                        <span class="ml-3 text-md font-medium text-gray-800">Your ans:
                                        <span
                                            class="<?php echo e($item->status=='correct' ?'text-green-600 dark:text-green-600':'text-pink-600'); ?>"><?php echo e($item->user_answer?is_numeric($item->user_answer)?number_format($item->user_answer, 2):$item->user_answer:'no answer'); ?></span>
                                    </span>
                    </label>
                </li>
                <li>
                    <label class="flex items-center text-sm">
                                    <span class="ml-3 text-md font-medium text-gray-800">Correct ans:
                                        <span class="text-green-600"><?php echo e(is_numeric($item->answer)?number_format($item->answer, 2):$item->answer); ?></span>
                                    </span>
                    </label>
                </li>
            </ul>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <center>
        <a href="<?php echo e(route('quizzes')); ?>"
           class="m-2 flex w-48 items-center px-3 py-1 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            <i class='bx bx-arrow-back bx-fade-left text-lg mx-1' ></i>
            <span class="mx-1"><?php echo app('translator')->get('back to quizzes'); ?></span>
        </a>
    </center>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <?php
        $__scriptKey = '3075274713-0';
        ob_start();
    ?>
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
                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('loadId', 0);
                        }, 5000)
                    })
                },
                isOpen: false,
                editMode: false,
                rows: <?php if ((object) ('selectedRows') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selectedRows'->value()); ?>')<?php echo e('selectedRows'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selectedRows'); ?>')<?php endif; ?>,
                selectPage: <?php if ((object) ('selectPageRows') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selectPageRows'->value()); ?>')<?php echo e('selectPageRows'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('selectPageRows'); ?>')<?php endif; ?>.live,
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
            <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
</div>
<?php /**PATH C:\xampp\htdocs\almn\resources\views/livewire/quiz-component.blade.php ENDPATH**/ ?>