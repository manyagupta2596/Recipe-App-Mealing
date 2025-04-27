<div>
    <div class="items-top space-y-4 md:space-y-0 md:grid md:grid-cols-9 md:space-x-6">
        <div>
            <input type="text" placeholder="Amount" wire:model="quantity" class="border-1 border-gray-100 shadow bg-opacity-20 rounded-lg placeholder-gray-500 w-full focus:outline-none focus:ring-1 focus:border-green-500 focus:ring-green-500 dark:bg-gray-900 dark:border-transparent dark:text-gray-200">
        </div>
        <div class="w-full relative md:col-span-4">
            <input type="text" placeholder="Search Ingredients..." wire:model.debounce.300ms="query" wire:keydown.escape="resetQuery" wire:keydown.tab="resetQuery" class="border-1 border-gray-100 shadow bg-opacity-20 rounded-lg placeholder-gray-500 w-full focus:outline-none focus:ring-1 focus:border-green-500 focus:ring-green-500 dark:bg-gray-900 dark:border-transparent dark:text-gray-200">
            
            <div class="absolute z-10 w-full bg-white dark:bg-gray-700 rounded-b-lg shadow-lg">
                <p wire:loading wire:target="query" class="px-2 py-1 dark:text-gray-200">
                    Searching...
                </p>
            </div>

            <?php if(!empty($query) && !$autocomplete): ?>
                <div class="absolute z-10 w-full bg-white dark:bg-gray-700  rounded-b-lg shadow-lg">
                    <?php if(!empty($ingredients)): ?>
                        <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p
                                <?php if($loop->last): ?>
                                    class="px-2 py-1 cursor-pointer rounded-b-lg hover:bg-blueGray-200 dark:text-gray-200"
                                <?php else: ?>
                                    class="px-2 py-1 cursor-pointer hover:bg-blueGray-200 dark:text-gray-200"
                                <?php endif; ?>
                                wire:click="autocomplete('<?php echo e($ingredient['name']); ?>', <?php echo e($ingredient['id']); ?>)"
                            >
                                <?php echo e($ingredient['name']); ?>

                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array(ucwords($query), $ingredient)): ?>
                                <?php break; ?>
                            <?php endif; ?>

                            <?php if($loop->last): ?>
                                <p class="px-2 py-1 cursor-pointer rounded-b-lg dark:text-gray-200" wire:click.prevent="createIngredient()">
                                    Add "<?php echo e($query); ?>"
                                </p>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ingredient_create')): ?>
                            <p class="px-2 py-1 cursor-pointer rounded-b-lg dark:text-gray-200" wire:click.prevent="createIngredient()">
                                No Results - Add "<?php echo e($query); ?>"
                            </p>
                        <?php else: ?>
                            <p class="px-2 py-1 cursor-pointer rounded-b-lg dark:text-gray-200">
                                No Results
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="md:pl-6">
            <button wire:click.prevent="add(<?php echo e($i); ?>)" class="w-full lg:w-auto rounded shadow-md py-2 px-4 bg-green-700 text-white hover:bg-green-500">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div>
        <?php if(!empty($inputs)): ?>
            <ul>
                <?php $__currentLoopData = $inputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="font-light text-sm pt-2 md:text-base dark:text-gray-200">
                        <?php echo e($item['quantity']); ?> - <?php echo e($item['ingredient']); ?>

                        <button wire:click.prevent="remove(<?php echo e($key); ?>)" class="w-full lg:w-auto rounded shadow-md py-1 px-2 bg-gray-400 text-white hover:bg-gray-300 text-xs">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="hidden" name="quantities[<?php echo e($key); ?>]" value="<?php echo e($item['quantity']); ?>">
                        <input type="hidden" name="ingredients[<?php echo e($key); ?>]" value="<?php echo e($item['ingredientId']); ?>">
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\PHP\Mealing\resources\views/livewire/recipes/create.blade.php ENDPATH**/ ?>