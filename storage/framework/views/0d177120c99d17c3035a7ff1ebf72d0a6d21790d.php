<div class="rating text-center">
    <?php for($i = 5; $i > 0; $i--): ?>
        <?php if($score >= $i): ?>
            <i class="fas fa-star cursor-pointer text-yellow-500 text-2xl lg:text-lg" wire:click="rate(<?php echo e($i); ?>)"></i>
        <?php else: ?>
            <i class="far fa-star cursor-pointer text-yellow-500 text-2xl lg:text-lg" wire:click="rate(<?php echo e($i); ?>)"></i>
        <?php endif; ?>
    <?php endfor; ?>
</div>
<?php /**PATH C:\xampp\htdocs\PHP\Mealing\resources\views/livewire/recipes/rate.blade.php ENDPATH**/ ?>