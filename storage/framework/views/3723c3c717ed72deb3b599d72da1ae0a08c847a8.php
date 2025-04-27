

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<form action="/login" method="POST" class="p-3 space-y-3">
    <?php echo csrf_field(); ?>
    <?php if(session('message')): ?>
        <div class="bg-red-400 bg-opacity-20 text-red-700 border-l-4 border-red-400 py-3 px-4 dark:bg-opacity-40 dark:text-red-300">
            <i class="fas fa-exclamation-circle mr-1"></i> <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 italic text-xs font-light">
            <?php echo e($message); ?>

        </p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <div class="grid grid-cols-1 lg:grid-cols-3 items-center">
        <label for="email" class="hidden lg:block dark:text-gray-200">
            Email
        </label>
        <input type="email" placeholder="Email" id="email" name="email" class="border-1 border-gray-100 shadow bg-opacity-20 rounded-lg placeholder-gray-500 w-full lg:w-60 focus:outline-none focus:ring-1 focus:border-green-500 focus:ring-green-500 dark:bg-gray-900 dark:border-transparent dark:text-gray-200">
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 items-center">
        <label for="password" class="hidden lg:block dark:text-gray-200">
            Password
        </label>
        <input type="password" placeholder="Password" id="password" name="password" class="border-1 border-gray-100 shadow bg-opacity-20 rounded-lg placeholder-gray-500 w-full lg:w-60 focus:outline-none focus:ring-1 focus:border-green-500 focus:ring-green-500 dark:bg-gray-900 dark:border-transparent dark:text-gray-200">
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 items-center">
        <div class="lg:col-start-2 col-span-2">
            <a href="<?php echo e(route('password.request')); ?>" class="text-sm hover:text-yellow-600 dark:text-gray-200 dark:hover:text-yellow-600">
                Forgotten My Password
            </a>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 items-center">
        <div class="lg:col-start-2">
            <p class="dark:text-gray-200 space-x-2">
                <input type="checkbox" name="remember" id="remember" class="rounded text-green-700 focus:outline-none focus:ring-1 focus:border-green-500 focus:ring-green-500 dark:bg-gray-900 dark:border-transparent dark:text-gray-200 dark:focus:bg-green-700">
                <label for="remember">
                    Remember Me
                </label>
            </p>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-3 items-center">
        <button type="submit" class="w-full lg:w-auto rounded shadow-md py-2 px-4 bg-green-700 text-white hover:bg-green-500">
            Login
        </button>
        <a href="<?php echo e(route('register')); ?>" class="w-full lg:w-auto rounded shadow-md py-2 px-4 bg-gray-400 text-white hover:bg-gray-300 text-center">
            Register
        </a>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Mealing\resources\views/auth/login.blade.php ENDPATH**/ ?>