<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['disabled' => false, 'errorName' => 'asdf']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['disabled' => false, 'errorName' => 'asdf']); ?>
<?php foreach (array_filter((['disabled' => false, 'errorName' => 'asdf']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $errorClass = $errors->has($errorName) ? 'border-red-500' : '';
?>
<input style="appearance: none" <?php echo e($disabled ? 'disabled' : ''); ?> <?php echo $attributes->merge(['class' => $errorClass. ' block placeholder-gray-300 w-full p-2 appearance-none text-gray-700 bg-white border border-gray-200 rounded-xl dark:bg-dark dark:text-white dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring']); ?>>
<!--[if BLOCK]><![endif]--><?php $__errorArgs = [$errorName];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-sm text-red-500 font-medium"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\xampp\htdocs\almn\resources\views/components/input.blade.php ENDPATH**/ ?>