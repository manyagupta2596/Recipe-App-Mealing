<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a357069ed8.js" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
        <title>Mealing <?php echo $__env->yieldContent('title'); ?></title>
    </head>

    <body>
        <div class="w-full h-screen flex items-center justify-center p-4 bg-gray-100 dark:bg-gray-800">
            <div class="w-full lg:max-w-md rounded-md shadow-md bg-white dark:bg-gray-700">
                <div class="w-full p-4 border-b border-gray-200 text-center dark:text-gray-200">
                    <i class="fas fa-pizza-slice self-center text-3xl pb-3"></i>
                    <p class="font-bold">
                        Mealing <?php echo $__env->yieldContent('title'); ?>
                    </p>
                </div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </body>
</html><?php /**PATH C:\xampp\htdocs\PHP\Mealing\resources\views/auth/layout.blade.php ENDPATH**/ ?>