<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo app('translator')->get('User Table'); ?></title>
    <style>
        body {
            font-family: 'examplefont', sans-serif;
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

                    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
                        <table style="border-collapse: collapse; width: 600px; border: 1px solid #ccc;">





                            <tr>
                                <td style="width: 50%; padding: 10px; border: 1px solid #ccc;">
                                    <h3 style="margin: 0;"><?php echo app('translator')->get('Admin'); ?>: <?php echo e($setup->name); ?></h3>
                                    <p style="margin: 5px 0;"><?php echo app('translator')->get('Address'); ?>: <?php echo e($setup->location); ?></p>
                                    <p style="margin: 5px 0;"><?php echo app('translator')->get('Phone'); ?>: <?php echo e($setup->phone); ?></p>
                                    <p style="margin: 5px 0;"><?php echo app('translator')->get('Email'); ?>: <?php echo e($setup->email); ?></p>
                                </td>








                            </tr>
                        </table>
                    </div>

                </div>
        </div>
        <div style="">

            <h2 style="text-align: center;"><?php echo app('translator')->get('User Table'); ?></h2>

            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;text-transform: capitalize">
                <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('ID'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('Name'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('Email'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('Type'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('Status'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('phone'); ?></th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo app('translator')->get('address'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr style="border: 1px solid #ddd;">
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($item->id); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($item->name); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($item->email); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($item->type); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($item->status); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e($item->phone); ?></td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;"><?php echo e(str($item->address)->words(5)); ?></td>
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
<?php /**PATH C:\xampp\htdocs\almn\resources\views/pdf/users.blade.php ENDPATH**/ ?>