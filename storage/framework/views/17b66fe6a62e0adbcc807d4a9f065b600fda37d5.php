

<?php $__env->startSection('title', 'Menus'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex justify-between py-3">
    <a href="<?php echo e(route('menus.index', ['week_start' => $links['prev']])); ?>" class="w-full lg:w-auto rounded shadow-md py-1 px-2 bg-gray-400 text-white hover:bg-gray-300 text-xs">
        Prev. Week
    </a>
    <a href="<?php echo e(route('menus.index', ['week_start' => $links['next']])); ?>" class="w-full lg:w-auto rounded shadow-md py-1 px-2 bg-green-700 text-white hover:bg-green-500 text-xs">
        Next Week
    </a>
</div>
    <?php if(is_null($current)): ?>
        <div class="flex justify-center items-center bg-white dark:bg-gray-700 rounded w-full py-52">
            <div class="flex flex-col dark:text-gray-200 text-center space-y-2">
                <i class="fas fa-hamburger fa-4x"></i>
                <?php if($recipeCount > 4): ?>
                    <p class="mb-5 dark:text-gray-200">
                        You don't have a menu for this week
                    </p>
                    <?php if(Request::has('week_start')): ?>
                        <a href="<?php echo e(route('menus.create', ['week_start' => Request::query('week_start')])); ?>" class="w-full lg:w-auto rounded shadow-md py-2 px-4 bg-green-700 text-white hover:bg-green-500">
                    <?php else: ?>                    
                        <a href="<?php echo e(route('menus.create')); ?>" class="w-full lg:w-auto rounded shadow-md py-2 px-4 bg-green-700 text-white hover:bg-green-500">
                    <?php endif; ?>
                        Create Menu
                    </a>
                <?php else: ?>
                    <p class="mb-5 dark:text-gray-200">
                        There are currently not enough recipes to create a menu
                    </p>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7 gap-2">
            <?php $__currentLoopData = $weekDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $recipe = $current->recipes()->with('media', 'ratings')->where('date', $date)->first();    
                ?>
                <a href="<?php echo e(route('recipes.show', $recipe)); ?>" class="rounded shadow bg-white dark:bg-gray-700">
                    <div class="text-center font-bold dark:text-gray-200 py-3">
                        <?php echo e($day); ?>

                    </div>
                    <div>
                        <?php if( $recipe->getMedia()->count() > 0): ?>
                            <img src="<?php echo e($recipe->getFirstMediaUrl()); ?>" class="w-full max-h-48 object-cover">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/640x360.png?text=No+Image" class="w-full h-48 object-cover">
                        <?php endif; ?>
                    </div>
                    <div class="p-2">
                        <p class="mb-1 dark:text-gray-200">
                            <?php echo e($recipe->name); ?>

                        </p>
                        <p class="text-sm text-yellow-400 mb-3" title="<?php echo e($recipe->avg_rating > 0 ? $recipe->avg_rating : '0'); ?>">
                            <?php for($x = 0; $x < 5; $x++): ?>
                                <?php if(floor($recipe->avg_rating)-$x >= 1): ?>
                                    <i class="fas fa-star"></i>
                                <?php elseif($recipe->avg_rating-$x > 0): ?>
                                    <i class="fas fa-star-half-alt"></i>
                                <?php else: ?>
                                    <i class="far fa-star"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </p>
                        <p class="mb-3 dark:text-gray-200">
                            Serves: <?php echo e($recipe->servings); ?>

                        </p>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="w-full rounded-md shadow-md bg-white dark:bg-gray-700 mt-5">
            <div class="w-full p-4 border-b border-gray-200">
                <p class="font-bold dark:text-gray-200">
                    Shopping List
                </p>
            </div>
            <div class=" p-3">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7 gap-2">
                    <?php $__currentLoopData = $current->recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <?php $__currentLoopData = $recipe->ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="dark:text-gray-200">
                                    <?php echo e($ingredient->pivot->quantity); ?> x <?php echo e($ingredient->name); ?>

                                </p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Mealing\resources\views/menus/index.blade.php ENDPATH**/ ?>