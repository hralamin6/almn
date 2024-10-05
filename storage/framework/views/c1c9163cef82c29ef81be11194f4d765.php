<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo app('translator')->get('Words Table'); ?></title>
    <style>
        body {
            /*font-family: 'examplefont', sans-serif;*/
        }
    </style>
</head>
<body>

<div style="">
    <div style="border: 2px solid #007bff; padding: 10px; border-radius: 10px; background-color: #f8f9fa; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

        <div style="">
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;text-transform: capitalize">
                <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('SL'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('words'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('with_harakah'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('meaning'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('plural'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('gender'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('pop'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('data'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr style="border: 1px solid #ddd;">
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($i+1); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd; font-family: XBRiyaz"><?php echo e($item->name); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd; font-family: XBRiyaz"><?php echo e($item->with_harakah); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd; font-family: examplefont"><?php echo e($item->meaning); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd; font-family: examplefont"><?php echo e($item->plural); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($item->gender); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($item->pop); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">
                            <?php if(is_array($item->data)): ?>
                                <?php $__currentLoopData = $item->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($key); ?>: <?php echo e($value. ', '); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <?php endif; ?>


                </tbody>
            </table>

        </div>

    </div>

</div>
</body>
</html>


<?php /**PATH /home/hralamin/www/almn/resources/views/excel/words.blade.php ENDPATH**/ ?>