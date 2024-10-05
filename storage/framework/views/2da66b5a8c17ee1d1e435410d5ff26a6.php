<div class="items-center justify-center p-2 min-h-screen capitalize" x-data="user()">
    <div x-show="isOpen" class="text-sm mx-auto w-full">
        <form @submit.prevent="editMode? $wire.editData(): $wire.saveData()"
              class="relative py-3 px-2 md:px-10 bg-white dark:bg-darker shadow-md rounded border border-gray-400 dark:border-gray-600 capitalize">
            <h1 x-cloak x-show="!editMode"
                class="text-gray-800 dark:text-gray-200 font-lg font-semibold text-center mb-4"><?php echo app('translator')->get('add new data'); ?></h1>
            <h1 x-cloak x-show="editMode"
                class="text-gray-800 dark:text-gray-200 font-lg font-semibold text-center mb-4"><?php echo app('translator')->get('edit this data'); ?></h1>

            <div class="grid grid-cols-1 gap-2 md:space-x-12 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="input"><?php echo app('translator')->get('name'); ?></label>
                    <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['errorName' => 'name','xRef' => 'inputName','id' => 'input','wire:model' => 'name','type' => 'text']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['errorName' => 'name','x-ref' => 'inputName','id' => 'input','wire:model' => 'name','type' => 'text']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="meaning"><?php echo app('translator')->get('meaning'); ?></label>
                    <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['errorName' => 'meaning','wire:model' => 'meaning','type' => 'text']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['errorName' => 'meaning','wire:model' => 'meaning','type' => 'text']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
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
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-sm text-red-500 font-medium"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="flex flex-col  justify-center space-x-4">
                    <div class="space-x-1">
                        <input type="radio" wire:model="pop" value="noun" id="noun">
                        <label for="noun">Noun</label>
                    </div>
                    <div class="space-x-1">
                        <input type="radio" wire:model="pop" value="adjective" id="adjective">
                        <label for="adjective">Adjective</label>
                    </div>
                    <div class="space-x-1">
                        <input type="radio" wire:model="pop" value="adverb" id="adverb">
                        <label for="adverb">Adverb</label>
                    </div>
                    <div class="space-x-1">
                        <input type="radio" wire:model="pop" value="preposition" id="preposition">
                        <label for="preposition">preposition</label>
                    </div>
                    <div class="space-x-1">
                        <input type="radio" wire:model="pop" value="conjuntion" id="conjuntion">
                        <label for="conjuntion">conjuntion</label>
                    </div>
                    <div class="space-x-1">
                        <input type="radio" wire:model="pop" value="verb" id="verb">
                        <label for="verb">Verb</label>
                    </div>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-sm text-red-500 font-medium"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
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
                        <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['wire:model.live' => 'itemPerPage','type' => 'number','class' => 'appearance-hidden dark:bg-darker']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'itemPerPage','type' => 'number','class' => 'appearance-hidden dark:bg-darker']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                    </div>
                    <div class="flex items-center  md:mt-0">
            <span class="absolute">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-magnifying-glass'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 mx-3 text-gray-400 dark:text-gray-600']); ?>
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
            </span>
                        <input wire:model.live="search" type="text" placeholder="Search"
                               class="w-48 block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-darker dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                        <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['id' => 'searchBy','wire:model.live' => 'searchBy','class' => 'w-48 dark:bg-darker capitalize']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'searchBy','wire:model.live' => 'searchBy','class' => 'w-48 dark:bg-darker capitalize']); ?>
                            <option value="name"><?php echo app('translator')->get('name'); ?></option>
                            <option value="meaning"><?php echo app('translator')->get('meaning'); ?></option>
                            <option value="pop"><?php echo app('translator')->get('parts of speech'); ?></option>
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
                </div>

            </div>

            <div class="flex items-center justify-between mt-2 gap-x-1">
                <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                        <div>
                            <form wire:submit="import">
                                <?php echo csrf_field(); ?>
                                <div
                                    x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false, $wire.import()"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                >
                                    <label for="dropzone-file"
                                           class="flex flex-col items-center w-full max-w-lg px-1 mx-auto text-center bg-white border-2 border-gray-300 border-dashed cursor-pointer dark:bg-darker dark:border-gray-700 rounded-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor"
                                             class="w-8 h-8 text-gray-500 dark:text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"/>
                                        </svg>
                                        <input id="dropzone-file" type="file" class="hidden" wire:model="photo"/>
                                    </label>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                    
                                    <div wire:loading wire:target="photo, import">...</div>
                                    <div x-show="isUploading">
                                        <progress max="100" x-bind:value="progress"></progress>
                                    </div>
                                </div>
                            </form>

                        </div>

                    <?php endif; ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <button wire:click.prevent="generate_pdf"
                        class="capitalize flex items-center justify-center w-1/2 px-2 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-darker hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-arrow-down-tray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                    <span><?php echo app('translator')->get('pdf'); ?></span>
                </button>
                <button wire:click.prevent="export"
                        class="capitalize flex items-center justify-center w-1/2 px-2 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-darker hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-arrow-down-tray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                    <span><?php echo app('translator')->get('excel'); ?></span>
                </button>

                <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
                    <button x-cloak @click="toggleModal"
                            class="capitalize flex items-center justify-center w-1/2 px-2 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-darker hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-plus-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                        <span><?php echo app('translator')->get('add'); ?></span>
                    </button>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>

        </div>
        <div class="flex space-x-2 justify-between">
            <div
                class="inline-flex overflow-hidden mt-2 bg-white border divide-x rounded-lg dark:bg-darker rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                <button wire:click="$set('itemGender', null)"
                        class="capitalize px-2 py-2 text-xs font-medium  transition-colors duration-200 sm:text-sm text-gray-600 <?php echo e(!$itemGender?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'); ?> ">
                    <?php echo app('translator')->get('all'); ?>
                </button>

                <button wire:click="$set('itemGender', 'male')"
                        class="capitalize px-2 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm <?php echo e($itemGender=='male'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'); ?>">
                    <?php echo app('translator')->get('male'); ?>
                </button>

                <button wire:click="$set('itemGender', 'female')"
                        class="capitalize px-2 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm <?php echo e($itemGender=='female'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'); ?>">
                    <?php echo app('translator')->get('female'); ?>
                </button>

            </div>
            <div
                class="inline-flex overflow-hidden mt-2 bg-white border divide-x rounded-lg dark:bg-darker rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                <button wire:click="$set('itemPop', null)"
                        class="capitalize px-2 py-2 text-xs font-medium  transition-colors duration-200 sm:text-sm text-gray-600 <?php echo e(!$itemPop?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'); ?> ">
                    <?php echo app('translator')->get('all'); ?>
                </button>

                <button wire:click="$set('itemPop', 'noun')"
                        class="capitalize px-2 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm <?php echo e($itemPop=='noun'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'); ?>">
                    <?php echo app('translator')->get('noun'); ?>
                </button>

                <button wire:click="$set('itemPop', 'adjective')"
                        class="capitalize px-2 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm <?php echo e($itemPop=='adjective'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'); ?>">
                    <?php echo app('translator')->get('adj'); ?>
                </button>
                <button wire:click="$set('itemPop', 'verb')"
                        class="capitalize px-2 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm <?php echo e($itemPop=='verb'?'bg-gray-100 dark:bg-gray-800 dark:text-gray-300':'dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'); ?>">
                    <?php echo app('translator')->get('verb'); ?>
                </button>

            </div>
        </div>
        <div class="flex space-x-2 justify-between">
            <div>
                <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['id' => 'groupBy','wire:model.live' => 'groupBy','class' => 'w-48 dark:bg-darker capitalize']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'groupBy','wire:model.live' => 'groupBy','class' => 'w-48 dark:bg-darker capitalize']); ?>
                    <option value="id"><?php echo app('translator')->get('group by id'); ?></option>
                    <option value="name"><?php echo app('translator')->get('group by name'); ?></option>
                    <option value="meaning"><?php echo app('translator')->get('group by meaning'); ?></option>
                    <option value="pop"><?php echo app('translator')->get('group by POP'); ?></option>
                    <option value="status"><?php echo app('translator')->get('group by status'); ?></option>
                    <option value="user_id"><?php echo app('translator')->get('group by user'); ?></option>
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
            <div>
                <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['id' => 'itemUserIds','wire:model.live' => 'itemUserIds','class' => 'w-48 dark:bg-darker capitalize']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'itemUserIds','wire:model.live' => 'itemUserIds','class' => 'w-48 dark:bg-darker capitalize']); ?>
                    <option value="<?php echo e(null); ?>"><?php echo app('translator')->get('all users'); ?></option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
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
                                                <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
                                                    <div x-show="bulk"
                                                         class="absolute  z-50 left-0 w-48 py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800"
                                                         @click.outside="bulk= false">

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                                                            <a @click="$dispatch('delete', { title: 'Are you sure to delete', text: 'It is not revertable', icon: 'error',actionName: 'deleteMultiple', itemId: '' })"
                                                               class="cursor-pointer block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                                Delete </a>
                                                        <?php endif; ?>

                                                        <a @click="$dispatch('delete', { title: 'Do you want to add to wishlist', text: 'You can change it again', icon: 'warning',actionName: 'wishListMultiple', itemId: '' })"
                                                           class="cursor-pointer block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                            <?php echo app('translator')->get('wishlist'); ?> </a>
                                                        <a @click="$dispatch('delete', { title: 'Do you want to add to your words', text: 'You can change it again', icon: 'success',actionName: 'createMultiple', itemId: '' })"
                                                           class="cursor-pointer block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                            <?php echo app('translator')->get('my words'); ?> </a>
                                                        
                                                    </div>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                            </div>
                                        </div>
                                    </th>
                                    <?php if (isset($component)) { $__componentOriginalae4c123bc9806121d87d234de2f27a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae4c123bc9806121d87d234de2f27a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.field','data' => ['oB' => $orderBy,'oD' => $orderDirection,'field' => 'name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['OB' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderBy),'OD' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderDirection),'field' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('name')]); ?><?php echo app('translator')->get('word'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $attributes = $__attributesOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $component = $__componentOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__componentOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                                        
                                        
                                    <?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalae4c123bc9806121d87d234de2f27a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae4c123bc9806121d87d234de2f27a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.field','data' => ['oB' => $orderBy,'oD' => $orderDirection,'field' => 'meaning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['OB' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderBy),'OD' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderDirection),'field' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('meaning')]); ?><?php echo app('translator')->get('meaning'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $attributes = $__attributesOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $component = $__componentOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__componentOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalae4c123bc9806121d87d234de2f27a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae4c123bc9806121d87d234de2f27a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.field','data' => ['oB' => $orderBy,'oD' => $orderDirection,'field' => 'meaning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['OB' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderBy),'OD' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderDirection),'field' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('meaning')]); ?><?php echo app('translator')->get('plural'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $attributes = $__attributesOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $component = $__componentOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__componentOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
                                    
                                    
                                    
                                    
                                    <?php if (isset($component)) { $__componentOriginalae4c123bc9806121d87d234de2f27a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae4c123bc9806121d87d234de2f27a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.field','data' => ['oB' => $orderBy,'oD' => $orderDirection,'field' => 'gender']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['OB' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderBy),'OD' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderDirection),'field' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('gender')]); ?><?php echo app('translator')->get('gender'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $attributes = $__attributesOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $component = $__componentOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__componentOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalae4c123bc9806121d87d234de2f27a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae4c123bc9806121d87d234de2f27a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.field','data' => ['oB' => $orderBy,'oD' => $orderDirection,'field' => 'data']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['OB' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderBy),'OD' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderDirection),'field' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('data')]); ?><?php echo app('translator')->get('data'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $attributes = $__attributesOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $component = $__componentOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__componentOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalae4c123bc9806121d87d234de2f27a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae4c123bc9806121d87d234de2f27a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.field','data' => ['oB' => $orderBy,'oD' => $orderDirection,'field' => 'pop']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['OB' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderBy),'OD' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orderDirection),'field' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('pop')]); ?><?php echo app('translator')->get('pop'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $attributes = $__attributesOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $component = $__componentOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__componentOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalae4c123bc9806121d87d234de2f27a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae4c123bc9806121d87d234de2f27a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.field','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('action'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $attributes = $__attributesOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__attributesOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae4c123bc9806121d87d234de2f27a3b)): ?>
<?php $component = $__componentOriginalae4c123bc9806121d87d234de2f27a3b; ?>
<?php unset($__componentOriginalae4c123bc9806121d87d234de2f27a3b); ?>
<?php endif; ?>


                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-darker">
                                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <tr <?php if($loadId==$item->id): ?> wire:scroll <?php endif; ?> id="item-id-<?php echo e($item->id); ?>"
                                        class="<?php if($loadId==$item->id): ?> dark:bg-gray-500 bg-green-100 animate-pulse <?php endif; ?> text-gray-700 dark:text-gray-300 capitalize"
                                        :class="{'bg-gray-200 dark:bg-gray-600': rows.includes('<?php echo e($item->id); ?>') }">
                                        <td class="pl-2">
                                            <input x-model="rows" value="<?php echo e($item->id); ?>" id="<?php echo e($item->id); ?>"
                                                   type="checkbox"
                                                   class="justify-between text-blue-500 border-gray-300 rounded dark:bg-darker dark:ring-offset-gray-900 dark:border-gray-700">
                                        </td>

                                        <td class="px-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <div class="flex items-center gap-x-2">
                                                    <div>
                                                        
                                                        <h2 class="font-medium text-gray-800 dark:text-white "><?php echo e($item->with_harakah); ?></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        
                                        
                                        
                                        

                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        

                                        <td class="px-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap text-lg font-bangla"><?php echo e($item->meaning); ?></td>
                                        <td class="px-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap text-lg font-bangla"><?php echo e($item->plural); ?></td>
                                        
                                        
                                        <td class="text-sm font-normal <?php echo e($item->gender=='male'?'text-emerald-500':($item->gender=='female'?'text-pink-500':'text-green-500')); ?> "><?php echo e($item->gender); ?></td>
                                        <td class="text-sm font-normal">

                                            <!--[if BLOCK]><![endif]--><?php if(isset($item->data)): ?>
                                                <div x-data="{open:false}"
                                                     class="mt-2 p-2 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                                    <p @click="open=!open" class="text-gray-800 dark:text-gray-200">
                                                        <strong>Model Details:</strong></p>
                                                    <div x-show="open">
                                                        <div class="fixed z-10 inset-0 overflow-y-auto"
                                                             aria-labelledby="modal-title" role="dialog"
                                                             aria-modal="true">
                                                            <div
                                                                class="flex items-center justify-center min-h-screen px-4">

                                                                <div
                                                                    class="bg-white dark:bg-gray-800 rounded-lg shadow-xl sm:max-w-lg sm:w-full p-6"
                                                                    @click.outside="open = false">
                                                                    <div class="overflow-x-auto">

                                                                        <?php
                                                                            // Create an array that maps the keys to more user-friendly names
                                                                            $keyMap = [
                                                                                // Main Info
                                                                                'baab' => 'Verb Pattern (Baab)',
                                                                                'masdar' => 'Infinitive (Masdar)',
                                                                                'madee' => 'Past Tense (Madee)',
                                                                                'mudaree' => 'Present Tense (Mudaree)',
                                                                                'amr' => 'Imperative (Amr)',
                                                                                'nahee' => 'Negative Imperative (Nahee)',
                                                                                'ismul_fel' => 'Active Participle (Ism-ul-Fel)',
                                                                                // Madee Conjugations
                                                                                'madee_gaaib_male_oheed' => 'Past - 3rd Person Male Singular',
                                                                                'madee_gaaib_male_tasnia' => 'Past - 3rd Person Male Dual',
                                                                                'madee_gaaib_male_jama' => 'Past - 3rd Person Male Plural',
                                                                                'madee_gaaib_female_oheed' => 'Past - 3rd Person Female Singular',
                                                                                'madee_gaaib_female_tasnia' => 'Past - 3rd Person Female Dual',
                                                                                'madee_gaaib_female_jama' => 'Past - 3rd Person Female Plural',
                                                                                'madee_haader_male_oheed' => 'Past - 2nd Person Male Singular',
                                                                                'madee_haader_male_tasnia' => 'Past - 2nd Person Male Dual',
                                                                                'madee_haader_male_jama' => 'Past - 2nd Person Male Plural',
                                                                                'madee_haader_female_oheed' => 'Past - 2nd Person Female Singular',
                                                                                'madee_haader_female_tasnia' => 'Past - 2nd Person Female Dual',
                                                                                'madee_haader_female_jama' => 'Past - 2nd Person Female Plural',
                                                                                'madee_mutakallim_oheed' => 'Past - 1st Person Singular',
                                                                                'madee_mutakallim_jama' => 'Past - 1st Person Plural',
                                                                                // Mudaree Conjugations
                                                                                'mudaree_gaaib_male_oheed' => 'Present - 3rd Person Male Singular',
                                                                                'mudaree_gaaib_male_tasnia' => 'Present - 3rd Person Male Dual',
                                                                                'mudaree_gaaib_male_jama' => 'Present - 3rd Person Male Plural',
                                                                                'mudaree_gaaib_female_oheed' => 'Present - 3rd Person Female Singular',
                                                                                'mudaree_gaaib_female_tasnia' => 'Present - 3rd Person Female Dual',
                                                                                'mudaree_gaaib_female_jama' => 'Present - 3rd Person Female Plural',
                                                                                'mudaree_haader_male_oheed' => 'Present - 2nd Person Male Singular',
                                                                                'mudaree_haader_male_tasnia' => 'Present - 2nd Person Male Dual',
                                                                                'mudaree_haader_male_jama' => 'Present - 2nd Person Male Plural',
                                                                                'mudaree_haader_female_oheed' => 'Present - 2nd Person Female Singular',
                                                                                'mudaree_haader_female_tasnia' => 'Present - 2nd Person Female Dual',
                                                                                'mudaree_haader_female_jama' => 'Present - 2nd Person Female Plural',
                                                                                'mudaree_mutakallim_oheed' => 'Present - 1st Person Singular',
                                                                                'mudaree_mutakallim_jama' => 'Present - 1st Person Plural',
                                                                                // Amr Conjugations
                                                                                'amr_gaaib_male_oheed' => 'Imperative - 3rd Person Male Singular',
                                                                                'amr_gaaib_male_tasnia' => 'Imperative - 3rd Person Male Dual',
                                                                                'amr_gaaib_male_jama' => 'Imperative - 3rd Person Male Plural',
                                                                                'amr_gaaib_female_oheed' => 'Imperative - 3rd Person Female Singular',
                                                                                'amr_gaaib_female_tasnia' => 'Imperative - 3rd Person Female Dual',
                                                                                'amr_gaaib_female_jama' => 'Imperative - 3rd Person Female Plural',
                                                                                'amr_haader_male_oheed' => 'Imperative - 2nd Person Male Singular',
                                                                                'amr_haader_male_tasnia' => 'Imperative - 2nd Person Male Dual',
                                                                                'amr_haader_male_jama' => 'Imperative - 2nd Person Male Plural',
                                                                                'amr_haader_female_oheed' => 'Imperative - 2nd Person Female Singular',
                                                                                'amr_haader_female_tasnia' => 'Imperative - 2nd Person Female Dual',
                                                                                'amr_haader_female_jama' => 'Imperative - 2nd Person Female Plural',
                                                                                // Nahee Conjugations
                                                                                'nahee_gaaib_male_oheed' => 'Negative Imperative - 3rd Person Male Singular',
                                                                                'nahee_gaaib_male_tasnia' => 'Negative Imperative - 3rd Person Male Dual',
                                                                                'nahee_gaaib_male_jama' => 'Negative Imperative - 3rd Person Male Plural',
                                                                                'nahee_gaaib_female_oheed' => 'Negative Imperative - 3rd Person Female Singular',
                                                                                'nahee_gaaib_female_tasnia' => 'Negative Imperative - 3rd Person Female Dual',
                                                                                'nahee_gaaib_female_jama' => 'Negative Imperative - 3rd Person Female Plural',
                                                                                'nahee_haader_male_oheed' => 'Negative Imperative - 2nd Person Male Singular',
                                                                                'nahee_haader_male_tasnia' => 'Negative Imperative - 2nd Person Male Dual',
                                                                                'nahee_haader_male_jama' => 'Negative Imperative - 2nd Person Male Plural',
                                                                                'nahee_haader_female_oheed' => 'Negative Imperative - 2nd Person Female Singular',
                                                                                'nahee_haader_female_tasnia' => 'Negative Imperative - 2nd Person Female Dual',
                                                                                'nahee_haader_female_jama' => 'Negative Imperative - 2nd Person Female Plural',
                                                                                // Ismul Fel Conjugations
                                                                                'ismul_fel_male_oheed' => 'Active Participle - Male Singular',
                                                                                'ismul_fel_male_tasnia' => 'Active Participle - Male Dual',
                                                                                'ismul_fel_male_jama' => 'Active Participle - Male Plural',
                                                                                'ismul_fel_female_oheed' => 'Active Participle - Female Singular',
                                                                                'ismul_fel_female_tasnia' => 'Active Participle - Female Dual',
                                                                                'ismul_fel_female_jama' => 'Active Participle - Female Plural',
                                                                                // Ismul Maful Conjugations
                                                                                'ismul_maful_male_oheed' => 'Passive Participle - Male Singular',
                                                                                'ismul_maful_male_tasnia' => 'Passive Participle - Male Dual',
                                                                                'ismul_maful_male_jama' => 'Passive Participle - Male Plural',
                                                                                'ismul_maful_female_oheed' => 'Passive Participle - Female Singular',
                                                                                'ismul_maful_female_tasnia' => 'Passive Participle - Female Dual',
                                                                                'ismul_maful_female_jama' => 'Passive Participle - Female Plural',
                                                                            ];
                                                                        ?>

                                                                        <div class="container mx-auto p-6">
                                                                            <div class="overflow-x-auto">
                                                                                <table
                                                                                    class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
                                                                                    x-data="{ open: '' }">
                                                                                    <!-- Main Info -->
                                                                                    <thead
                                                                                        class="bg-gray-50 dark:bg-gray-700">
                                                                                    <tr @click="open === 'general' ? open = '' : open = 'general'"
                                                                                        class="cursor-pointer">
                                                                                        <th colspan="2"
                                                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                                                                            General Info
                                                                                            <span
                                                                                                x-show="open !== 'general'">▼</span>
                                                                                            <span
                                                                                                x-show="open === 'general'">▲</span>
                                                                                        </th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody x-show="open === 'general'"
                                                                                           class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = ['baab', 'masdar', 'madee', 'mudaree', 'amr', 'nahee', 'ismul_fel']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tr>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($keyMap[$key]); ?></td>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($item->data[$key] ?? ''); ?></td>
                                                                                        </tr>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                                                    </tbody>

                                                                                    <!-- Madee Conjugations -->
                                                                                    <thead
                                                                                        class="bg-gray-50 dark:bg-gray-700">
                                                                                    <tr @click="open === 'madee' ? open = '' : open = 'madee'"
                                                                                        class="cursor-pointer">
                                                                                        <th colspan="2"
                                                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                                                                            Madee Conjugations
                                                                                            <span
                                                                                                x-show="open !== 'madee'">▼</span>
                                                                                            <span
                                                                                                x-show="open === 'madee'">▲</span>
                                                                                        </th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody x-show="open === 'madee'"
                                                                                           class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = ['madee_gaaib_male_oheed', 'madee_gaaib_male_tasnia', 'madee_gaaib_male_jama', 'madee_gaaib_female_oheed', 'madee_gaaib_female_tasnia', 'madee_gaaib_female_jama', 'madee_haader_male_oheed', 'madee_haader_male_tasnia', 'madee_haader_male_jama', 'madee_haader_female_oheed', 'madee_haader_female_tasnia', 'madee_haader_female_jama', 'madee_mutakallim_oheed', 'madee_mutakallim_jama']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tr>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($keyMap[$key]); ?></td>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($item->data[$key] ?? ''); ?></td>
                                                                                        </tr>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                                                    </tbody>

                                                                                    <!-- Mudaree Conjugations -->
                                                                                    <thead
                                                                                        class="bg-gray-50 dark:bg-gray-700">
                                                                                    <tr @click="open === 'mudaree' ? open = '' : open = 'mudaree'"
                                                                                        class="cursor-pointer">
                                                                                        <th colspan="2"
                                                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                                                                            Mudaree Conjugations
                                                                                            <span
                                                                                                x-show="open !== 'mudaree'">▼</span>
                                                                                            <span
                                                                                                x-show="open === 'mudaree'">▲</span>
                                                                                        </th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody x-show="open === 'mudaree'"
                                                                                           class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = ['mudaree_gaaib_male_oheed', 'mudaree_gaaib_male_tasnia', 'mudaree_gaaib_male_jama', 'mudaree_gaaib_female_oheed', 'mudaree_gaaib_female_tasnia', 'mudaree_gaaib_female_jama', 'mudaree_haader_male_oheed', 'mudaree_haader_male_tasnia', 'mudaree_haader_male_jama', 'mudaree_haader_female_oheed', 'mudaree_haader_female_tasnia', 'mudaree_haader_female_jama', 'mudaree_mutakallim_oheed', 'mudaree_mutakallim_jama']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tr>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($keyMap[$key]); ?></td>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($item->data[$key] ?? ''); ?></td>
                                                                                        </tr>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                                                    </tbody>

                                                                                    <!-- Amr Conjugations -->
                                                                                    <thead
                                                                                        class="bg-gray-50 dark:bg-gray-700">
                                                                                    <tr @click="open === 'amr' ? open = '' : open = 'amr'"
                                                                                        class="cursor-pointer">
                                                                                        <th colspan="2"
                                                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                                                                            Amr Conjugations
                                                                                            <span
                                                                                                x-show="open !== 'amr'">▼</span>
                                                                                            <span
                                                                                                x-show="open === 'amr'">▲</span>
                                                                                        </th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody x-show="open === 'amr'"
                                                                                           class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = ['amr_gaaib_male_oheed', 'amr_gaaib_male_tasnia', 'amr_gaaib_male_jama', 'amr_gaaib_female_oheed', 'amr_gaaib_female_tasnia', 'amr_gaaib_female_jama', 'amr_haader_male_oheed', 'amr_haader_male_tasnia', 'amr_haader_male_jama', 'amr_haader_female_oheed', 'amr_haader_female_tasnia', 'amr_haader_female_jama']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tr>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($keyMap[$key]); ?></td>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($item->data[$key] ?? ''); ?></td>
                                                                                        </tr>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                                                    </tbody>
                                                                                    <tbody x-show="open === 'nahee'"
                                                                                           class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = ['nahee_gaaib_male_oheed', 'nahee_gaaib_male_tasnia', 'nahee_gaaib_male_jama', 'nahee_gaaib_female_oheed', 'nahee_gaaib_female_tasnia', 'nahee_gaaib_female_jama', 'nahee_haader_male_oheed', 'nahee_haader_male_tasnia', 'nahee_haader_male_jama', 'nahee_haader_female_oheed', 'nahee_haader_female_tasnia', 'nahee_haader_female_jama']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tr>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($keyMap[$key]); ?></td>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($item->data[$key] ?? ''); ?></td>
                                                                                        </tr>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                                                    </tbody>

                                                                                    <!-- Ismul Fel Conjugations -->
                                                                                    <thead
                                                                                        class="bg-gray-50 dark:bg-gray-700">
                                                                                    <tr @click="open === 'ismul_fel' ? open = '' : open = 'ismul_fel'"
                                                                                        class="cursor-pointer">
                                                                                        <th colspan="2"
                                                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                                                                            Ismul Fel Conjugations
                                                                                            <span
                                                                                                x-show="open !== 'ismul_fel'">▼</span>
                                                                                            <span
                                                                                                x-show="open === 'ismul_fel'">▲</span>
                                                                                        </th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody x-show="open === 'ismul_fel'"
                                                                                           class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = ['ismul_fel_male_oheed', 'ismul_fel_male_tasnia', 'ismul_fel_male_jama', 'ismul_fel_female_oheed', 'ismul_fel_female_tasnia', 'ismul_fel_female_jama']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tr>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($keyMap[$key]); ?></td>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($item->data[$key] ?? ''); ?></td>
                                                                                        </tr>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                                                    </tbody>

                                                                                    <!-- Ismul Maful Conjugations -->
                                                                                    <thead
                                                                                        class="bg-gray-50 dark:bg-gray-700">
                                                                                    <tr @click="open === 'ismul_maful' ? open = '' : open = 'ismul_maful'"
                                                                                        class="cursor-pointer">
                                                                                        <th colspan="2"
                                                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                                                                            Ismul Maful Conjugations
                                                                                            <span
                                                                                                x-show="open !== 'ismul_maful'">▼</span>
                                                                                            <span
                                                                                                x-show="open === 'ismul_maful'">▲</span>
                                                                                        </th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody
                                                                                        x-show="open === 'ismul_maful'"
                                                                                        class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = ['ismul_maful_male_oheed', 'ismul_maful_male_tasnia', 'ismul_maful_male_jama', 'ismul_maful_female_oheed', 'ismul_maful_female_tasnia', 'ismul_maful_female_jama']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tr>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($keyMap[$key]); ?></td>
                                                                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300"><?php echo e($item->data[$key] ?? ''); ?></td>
                                                                                        </tr>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                                                    </tbody>
                                                                                </table>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="mt-4">
                                                                        <button @click="open = false"
                                                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                                            Close
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </td>


                                        <td class="text-sm font-normal <?php echo e($item->pop=='noun'?'text-emerald-500':($item->pop=='adjective'?'text-pink-500':'text-green-500')); ?> "><?php echo e($item->pop); ?></td>
                                        <td class="px-4 text-sm whitespace-nowrap">
                                            <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
                                                <div class="flex items-center gap-x-6">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                                                        <button @click="editModal('<?php echo e($item->id); ?>')"
                                                                class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-pencil-square'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-green-400']); ?>
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

                                                        <button
                                                            @click.prevent="$dispatch('delete', { title: 'Are you sure to delete', text: 'It is not revertable', icon: 'error',actionName: 'deleteSingle', itemId: <?php echo e($item->id); ?> })"
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
                                                    <?php endif; ?>
                                                    <button wire:click="addToWishlist('<?php echo e($item->id); ?>')"
                                                            class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                        <!--[if BLOCK]><![endif]--><?php if(auth()->user()->words()->where('word_id',$item->id)->first()): ?>
                                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-s-heart'); ?>
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
                                                        <?php else: ?>
                                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-heart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-green-400']); ?>
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
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    </button>

                                                </div>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->guest()): ?>
                                                <a href="<?php echo e(route('socialite.auth', 'google')); ?>"
                                                   class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h-o-heart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-green-400']); ?>
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
                                                </a>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="mx-auto my-4 px-4 overflow-y-auto">
            <?php echo e($items->links()); ?>

            
        </div>
    </div>

    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    

    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    

    
    
    
    
    
    
    
    
    
    
    

    
    
    

        <?php
        $__scriptKey = '68706452-0';
        ob_start();
    ?>
    <script>
        Alpine.data('user', () => ({
            init() {
                $wire.on('dataAdded', (e) => {
                    // this.isOpen = false
                    this.editMode = false
                    element = document.getElementById(e.dataId)
                    if (element) {
                        console.log(element)
                        element.scrollIntoView({behavior: 'smooth'});
                    }
                    setTimeout(() => {
                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').
                        set('loadId', 0);
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
<?php /**PATH /home/hralamin/www/almn/resources/views/livewire/arabic-word-component.blade.php ENDPATH**/ ?>