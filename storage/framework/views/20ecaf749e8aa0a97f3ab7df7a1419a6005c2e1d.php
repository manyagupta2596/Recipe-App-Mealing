

<?php $__env->startSection('title', 'Cookie Policy'); ?>

<?php $__env->startSection('content'); ?>
<p class="font-bold mb-5 dark:text-gray-200">
    Top rated recipes
</p>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 mb-5">
    <?php echo csrf_field(); ?>
    <?php $__currentLoopData = $topRecipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('recipes.show', $recipe)); ?>">
            <div class="w-full h-full rounded-md shadow-md bg-white dark:bg-gray-700">
                <div>
                    <?php if($recipe->getMedia()->count() > 0): ?>
                        <img src="<?php echo e($recipe->getFirstMediaUrl('default', 'thumb')); ?>" class="w-full h-32 object-cover rounded-t-md" alt="<?php echo e($recipe->name); ?>">
                    
                    <?php else: ?>
                        <img src="https://www.indianveggiedelight.com/wp-content/uploads/2022/12/white-sauce-pasta-featured.jpg" class="w-full h-32 object-cover rounded-t-md" alt="No image available">
                    <?php endif; ?>
                </div>
                <div class="p-4 rounded-b-md dark:text-gray-200">
                    <p class="mb-2">
                        <?php echo e(ucfirst($recipe->name)); ?>

                    </p>
                    <p class="text-sm text-yellow-400" title="<?php echo e($recipe->avg_rating > 0 ? $recipe->avg_rating : '0'); ?>">
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
                </div>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Mealing\resources\views/homepage.blade.php ENDPATH**/ ?>