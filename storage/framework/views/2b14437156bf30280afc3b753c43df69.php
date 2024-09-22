<div>
    <center>

        <p class="text-2xl m-auto text-gray-600 dark:text-white"><?php echo app('translator')->get('exam settings'); ?></p>
    </center>
    <div class="flex flex-1 h-full p-4">
        <div class="m-2 md:w-1/2  items-center mx-auto text-sm dark:text-white capitalize">
            <div class="grid grid-cols-2  justify-between gap-2  capitalize my-3">
                <label for="is_single_page"><?php echo app('translator')->get('question pattern'); ?></label>
                <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['wire:model.live' => 'is_single_page','class' => 'select border border-indigo-400 dark:bg-gray-600 dark:bg-gray-600 text-sm select-sm text-sm select-sm max-w-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'is_single_page','class' => 'select border border-indigo-400 dark:bg-gray-600 dark:bg-gray-600 text-sm select-sm text-sm select-sm max-w-xs']); ?>
                    <option disabled selected><?php echo app('translator')->get('choose question patern'); ?></option>
                    <option value="1"><?php echo app('translator')->get('In a single page'); ?></option>
                    <option value="0"><?php echo app('translator')->get('one question per page'); ?></option>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
            </div>

            <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                <label for="is_single_page"><?php echo app('translator')->get('question number'); ?></label>
                <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['wire:model.live' => 'q_number','class' => 'select border border-indigo-400 dark:bg-gray-600 text-sm select-sm  max-w-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'q_number','class' => 'select border border-indigo-400 dark:bg-gray-600 text-sm select-sm  max-w-xs']); ?>
                    <option disabled selected><?php echo app('translator')->get('question amount'); ?></option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
            </div>
            <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                <label for="is_single_page"><?php echo app('translator')->get('time per question'); ?></label>
                <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['wire:model.live' => 'q_time','class' => 'select border border-indigo-400 dark:bg-gray-600 text-sm select-sm  max-w-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'q_time','class' => 'select border border-indigo-400 dark:bg-gray-600 text-sm select-sm  max-w-xs']); ?>
                    <option disabled selected><?php echo app('translator')->get('time per question'); ?></option>
                    <option value="10">10 sec</option>
                    <option value="15">15 sec</option>
                    <option value="30">30 sec</option>
                    <option value="45">45 sec</option>
                    <option value="60">60 sec</option>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
            </div>
            <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                <label for="is_single_page"><?php echo app('translator')->get('result system'); ?></label>
                <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['wire:model.live' => 'is_minus','class' => 'select border border-indigo-400 dark:bg-gray-600 text-sm select-sm  max-w-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'is_minus','class' => 'select border border-indigo-400 dark:bg-gray-600 text-sm select-sm  max-w-xs']); ?>
                    <option disabled selected>><?php echo app('translator')->get('result system'); ?></option>
                    <option value="1"><?php echo app('translator')->get('Minus for wrong ans.'); ?></option>
                    <option value="0"><?php echo app('translator')->get('No minus for wrong ans.'); ?></option>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
            </div>
            <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                <label for="is_single_page"><?php echo app('translator')->get('question type'); ?></label>
                <div class="flex justify-between space-x-2">
                    <div>
                        <label for="MCQ"><?php echo app('translator')->get('MCQ'); ?></label>
                        <input type="radio" wire:model.live="is_mcq" value="1" id="MCQ">
                    </div>
                    <div>
                        <label for="question"><?php echo app('translator')->get('question'); ?></label>
                        <input type="radio" wire:model.live="is_mcq" value="0" id="question">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                <label for="is_single_page"><?php echo app('translator')->get('words factory'); ?></label>
                <div class="flex justify-between space-x-2">
                    <div>
                        <label for="my_words"><?php echo app('translator')->get('my words'); ?></label>
                        <input type="radio" wire:model.live="is_my_words" value="1" id="my_words">
                    </div>
                    <div>
                        <label for="all_words"><?php echo app('translator')->get('all words'); ?></label>
                        <input type="radio" wire:model.live="is_my_words" value="0" id="all_words">
                    </div>
                </div>
            </div>

        <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
                <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                    <label for="is_single_page"><?php echo app('translator')->get('wishlist only'); ?></label>
                    <div class="flex justify-between space-x-2">
                        <div>
                            <label for="male"><?php echo app('translator')->get('yes'); ?></label>
                            <input type="radio" wire:model.live="isWishlist" value="1" id="male">
                        </div>
                        <div>
                            <label for="female"><?php echo app('translator')->get('no'); ?></label>
                            <input type="radio" wire:model.live="isWishlist" value="0" id="female">

                        </div>

                    </div>

                </div>
                <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                    <label for="is_single_page"><?php echo app('translator')->get('want to save exam?'); ?></label>
                    <div class="flex justify-between space-x-2">
                        <div>
                            <label for="yes"><?php echo app('translator')->get('yes'); ?></label>
                            <input type="radio" wire:model.live="isSave" value="1" id="yes">
                        </div>
                        <div>
                            <label for="no"><?php echo app('translator')->get('no'); ?></label>
                            <input type="radio" wire:model.live="isSave" value="0" id="no">

                        </div>

                    </div>

                </div>
                <div class="grid grid-cols-2  justify-start gap-2  capitalize my-3">
                    <label for="is_single_page"><?php echo app('translator')->get('Add wrong/skipped to wishlist?'); ?></label>
                    <div class="flex justify-between space-x-2">
                        <div>
                            <label for="yes"><?php echo app('translator')->get('yes'); ?></label>
                            <input type="radio" wire:model.live="isToWishlist" value="1" id="yes">
                        </div>
                        <div>
                            <label for="no"><?php echo app('translator')->get('no'); ?></label>
                            <input type="radio" wire:model.live="isToWishlist" value="0" id="no">

                        </div>

                    </div>

                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            

            <a href="<?php echo e(route('exam')); ?>?practise=meaning&from=name" wire:navigate class="m-1 bg-gradient-to-r from-red-500 to-green-500 flex gap-x-3 text-sm capitalize sm:text-base items-center justify-center text-white rounded-lg hover:bg-[#1877F2]/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                <span><?php echo app('translator')->get('word to meaning'); ?></span>
            </a>
            <a href="<?php echo e(route('exam')); ?>?practise=name&from=meaning" wire:navigate class="m-1 bg-gradient-to-r from-green-500 to-red-500 flex gap-x-3 text-sm capitalize sm:text-base items-center justify-center text-white rounded-lg hover:bg-[#1877F2]/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                <span><?php echo app('translator')->get('meaning to word'); ?></span>
            </a>
            <a href="<?php echo e(route('exam')); ?>?practise=pop&from=meaning" wire:navigate class="m-1 bg-gradient-to-r from-purple-500 to-pink-500 flex gap-x-3 text-sm capitalize sm:text-base items-center justify-center text-white rounded-lg hover:bg-[#1877F2]/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                <span><?php echo app('translator')->get('meaning to parts of speech'); ?></span>
            </a>
            <a href="<?php echo e(route('exam')); ?>?practise=meaning&from=pop" wire:navigate class="m-1 bg-gradient-to-r from-purple-500 to-pink-500 flex gap-x-3 text-sm capitalize sm:text-base items-center justify-center text-white rounded-lg hover:bg-[#1877F2]/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                <span><?php echo app('translator')->get('parts of speech to meaning'); ?></span>
            </a>


            <a href="<?php echo e(route('test')); ?>?practise=word_to_details" wire:navigate class="m-1 bg-gradient-to-r from-purple-500 to-pink-500 flex gap-x-3 text-sm capitalize sm:text-base items-center justify-center text-white rounded-lg hover:bg-[#1877F2]/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                <span><?php echo app('translator')->get('verb to details'); ?></span>
            </a>
            <a href="<?php echo e(route('test')); ?>?practise=details_to_verb" wire:navigate class="m-1 bg-gradient-to-r from-purple-500 to-pink-500 flex gap-x-3 text-sm capitalize sm:text-base items-center justify-center text-white rounded-lg hover:bg-[#1877F2]/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                <span><?php echo app('translator')->get('details to verb'); ?></span>
            </a>
        </div>

    </div>

</div>
<?php /**PATH /home/hralamin/www/almn/resources/views/livewire/practise-component.blade.php ENDPATH**/ ?>