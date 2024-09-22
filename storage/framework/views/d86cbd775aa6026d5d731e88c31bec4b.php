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

                <div style="text-align: center; align-items: center;">
                    <a href="<?php echo e($setup->site_url); ?>" style="flex: 1; ">
                        <img src="<?php echo e($setup->logo); ?>" alt="Company Logo" style="max-width: 100px; height: auto; align-items: center">
                    </a>
                    <center><a href="<?php echo e($setup->site_url); ?>" style="font-size: 18px; font-weight: bold;"><?php echo e($setup->site_name); ?></a></center>



























                </div>
        </div>
        <div style="">

            <h2 style="text-align: center;"><?php echo app('translator')->get('Words Table'); ?></h2>

            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;text-transform: capitalize">
                <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('SL'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('words'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('meaning'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('gender'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('pop'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr style="border: 1px solid #ddd;">
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($i+1); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd; font-family: XBRiyaz"><?php echo e($item->with_harakah); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd; font-family: examplefont"><?php echo e($item->meaning); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($item->gender); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($item->pop); ?></td>
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
<?php /**PATH /home/hralamin/www/almn/resources/views/pdf/words.blade.php ENDPATH**/ ?>