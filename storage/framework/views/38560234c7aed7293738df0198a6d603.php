<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['field' => 'id', 'OB'=>'', 'OD' => '']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['field' => 'id', 'OB'=>'', 'OD' => '']); ?>
<?php foreach (array_filter((['field' => 'id', 'OB'=>'', 'OD' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<th <?php echo e($attributes); ?> wire:click.prevent="orderByDirection('<?php echo e($field); ?>')" class="cursor-pointer px-4 py-3 capitalize text-sm font-normal dark:text-gray-400"> <?php echo e($slot); ?>

    <span class="text-xs text-purple-400"><?php echo e($OB==$field?'('.$OD.')':''); ?></span>
</th>
<?php /**PATH /home/hralamin/www/almn/resources/views/components/field.blade.php ENDPATH**/ ?>