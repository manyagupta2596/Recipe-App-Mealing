

<?php $__env->startSection('title', 'Account Settings'); ?>

<?php $__env->startSection('user.content'); ?>
<div class="bg-white rounded-md dark:bg-gray-700">
    <div class="w-full p-4 border-b border-gray-200 ">
        <p class="font-bold dark:text-gray-200">
            User Account Settings
        </p>
    </div>
    <div class="p-4">
        <section>
            <p class="font-bold dark:text-gray-200 mb-3">
                Profile
            </p>
            <?php if(session('profileStatus')): ?>
                <div class="bg-green-400 bg-opacity-20 text-green-700 border-l-4 border-green-400 py-3 px-4 dark:bg-opacity-40 dark:text-green-400">
                    <i class="fas fa-check-circle mr-1"></i> <?php echo e(session('profileStatus')); ?>

                </div>
            <?php endif; ?>
            <form action="<?php echo e(route('profile.settings.account')); ?>" method="POST" class="space-y-2">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="grid grid-cols-1 lg:grid-cols-6">
                    <label for="name" class="dark:text-gray-200 self-center">
                        Name
                    </label>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name', Auth::user()->name)); ?>" class="border-1 border-gray-100 shadow bg-opacity-20 rounded-lg placeholder-gray-500 w-full lg:w-60 focus:outline-none focus:ring-1 focus:border-green-500 focus:ring-green-500 dark:bg-gray-900 dark:border-transparent dark:text-gray-200">
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-6">
                    <label for="email" class="dark:text-gray-200 self-center">
                        Email
                    </label>
                    <input type="email" name="email" id="email" value="<?php echo e(old('email', Auth::user()->email)); ?>" class="border-1 border-gray-100 shadow bg-opacity-20 rounded-lg placeholder-gray-500 w-full lg:w-60 focus:outline-none focus:ring-1 focus:border-green-500 focus:ring-green-500 dark:bg-gray-900 dark:border-transparent dark:text-gray-200">
                </div>
                <div>
                    <button type="submit" class="w-full lg:w-auto rounded shadow-md py-2 px-4 bg-green-700 text-white hover:bg-green-500">
                        Save
                    </button>
                </div>
            </form>
        </section>
        <br><hr class="py-2">
        <section>
            <p class="font-bold dark:text-gray-200 mb-3">
                Change Password
            </p>
            <?php if(session('passwordStatus')): ?>
                <div class="bg-green-400 bg-opacity-20 text-green-700 border-l-4 border-green-400 py-3 px-4 dark:bg-opacity-40 dark:text-green-400">
                    <i class="fas fa-check-circle mr-1"></i> <?php echo e(session('passwordStatus')); ?>

                </div>
            <?php endif; ?>
            <?php $__errorArgs = ['current'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="bg-red-400 bg-opacity-20 text-red-700 border-l-4 border-red-400 py-3 px-4 dark:bg-opacity-40 dark:text-red-300">
                    <i class="fas fa-exclamation-circle mr-1"></i> <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="bg-red-400 bg-opacity-20 text-red-700 border-l-4 border-red-400 py-3 px-4 dark:bg-opacity-40 dark:text-red-300">
                    <i class="fas fa-exclamation-circle mr-1"></i> <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <form action="<?php echo e(route('profile.settings.password')); ?>" method="POST" class="space-y-2">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 lg:grid-cols-6">
                    <label for="current" class="dark:text-gray-200 self-center">
                        Current Password
                    </label>
                    <input type="password" name="current" id="current" required class="border-1 border-gray-100 shadow bg-opacity-20 rounded-lg placeholder-gray-500 w-full lg:w-60 focus:outline-none focus:ring-1 focus:border-green-500 focus:ring-green-500 dark:bg-gray-900 dark:border-transparent dark:text-gray-200">
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-6">
                    <label for="password" class="dark:text-gray-200 self-center">
                        New Password
                    </label>
                    <input type="password" name="password" id="password" required class="border-1 border-gray-100 shadow bg-opacity-20 rounded-lg placeholder-gray-500 w-full lg:w-60 focus:outline-none focus:ring-1 focus:border-green-500 focus:ring-green-500 dark:bg-gray-900 dark:border-transparent dark:text-gray-200">
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-6">
                    <label for="password_confirmation" class="dark:text-gray-200 self-center">
                        Confirm Password
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="border-1 border-gray-100 shadow bg-opacity-20 rounded-lg placeholder-gray-500 w-full lg:w-60 focus:outline-none focus:ring-1 focus:border-green-500 focus:ring-green-500 dark:bg-gray-900 dark:border-transparent dark:text-gray-200">
                </div>
                <div>
                    <button type="submit" class="w-full lg:w-auto rounded shadow-md py-2 px-4 bg-green-700 text-white hover:bg-green-500">
                        Change
                    </button>
                </div>
            </form>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Mealing\resources\views/user/profile/account.blade.php ENDPATH**/ ?>