<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['id', 'options', 'selected']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id', 'options', 'selected']); ?>
<?php foreach (array_filter((['id', 'options', 'selected']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="{ open: false, selected: <?php if ((object) ($selected) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($selected->value()); ?>')<?php echo e($selected->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($selected); ?>')<?php endif; ?>.defer }" @click.away="open = false">
    <div class="relative">
        <div class="flex items-center">
            <div class="relative">
                <div @click="open = !open" class="relative">
                    <div class="flex flex-wrap items-center">
                        <template x-for="(option, index) in <?php echo json_encode($options, 15, 512) ?>" :key="index">
                            <template x-if="selected.includes(option.id)">
                                <div class="flex items-center bg-blue-100 text-blue-800 m-1 p-1 rounded-lg">
                                    <span x-text="option.text" class="mr-1"></span>
                                    <button type="button" @click="selected = selected.filter(item => item !== option.id)">
                                        &#10005;
                                    </button>
                                </div>
                            </template>
                        </template>
                    </div>
                    <div x-show="open" class="absolute mt-1 w-full bg-white shadow-lg rounded-lg z-10">
                        <template x-for="(option, index) in <?php echo json_encode($options, 15, 512) ?>" :key="index">
                            <div class="flex items-center bg-gray-100 hover:bg-gray-200 cursor-pointer m-1 p-1 rounded-lg" @click="toggleSelection(option.id)">
                                <span x-text="option.text" class="mr-1"></span>
                                <template x-if="selected.includes(option.id)">
                                    &#10003;
                                </template>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="<?php echo e($id); ?>" x-bind:value="JSON.stringify(selected)">
</div>

<script>
    function toggleSelection(id) {
        let selected = window.Livewire.find('<?php echo e($_instance->getId()); ?>').get('selected');

        if (selected.includes(id)) {
            selected = selected.filter(item => item !== id);
        } else {
            selected.push(id);
        }

    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('selected', selected);
    }
</script>
<?php /**PATH /home/hralamin/www/almn/resources/views/components/select2.blade.php ENDPATH**/ ?>