<header class="lg:fixed">
    <div class="w-full bg-green-700 p-3 text-white lg:w-72 lg:h-screen" x-data="{open: false}" @click.away="open = false">
        <div class="flex justify-between items-center lg:mb-20 lg:mt-10">
            <a href="<?php echo e(route('homepage')); ?>" class="flex text-lg font-bold lg:text-center lg:w-full lg:flex-col">
                <i class="fas fa-pizza-slice pr-3 self-center lg:pr-0 lg:text-3xl lg:pb-3"></i>
                Mealing
            </a>
            <div class="text-lg lg:hidden">
                <button class="border border-gray-100 px-2 rounded-lg duration-300 ease-in-out transition text-center hover:bg-white hover:text-green-700" @click="open = !open" aria-label="Menu">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <div class="hidden lg:block mt-3" :class="{'hidden': !open}">
            <nav class="flex flex-col space-y-3">
                <a
                    href="<?php echo e(route('homepage')); ?>"
                    <?php if(request()->routeIs('homepage*')): ?>
                        class="w-full p-3 font-bold text-green-700 bg-white rounded-lg space-x-2"
                    <?php else: ?>
                        class="w-full p-3 font-bold rounded-lg hover:bg-white hover:text-green-700 space-x-2"
                    <?php endif; ?>
                >
                    <i class="fas fa-home"></i>
                    <span>
                        Home
                    </span>
                </a>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_access')): ?>
                    <a
                        href="<?php echo e(route('admin.dashboard')); ?>"
                        <?php if(request()->routeIs('admin*')): ?>
                            class="w-full p-3 font-bold text-green-700 bg-white rounded-lg space-x-2"
                        <?php else: ?>
                            class="w-full p-3 font-bold rounded-lg hover:bg-white hover:text-green-700 space-x-2"
                        <?php endif; ?>
                    >
                        <i class="fas fa-tachometer-alt"></i>
                        <span>
                            Admin
                        </span>
                    </a>
                <?php endif; ?>
                <a
                    href="<?php echo e(route('menus.index')); ?>"
                    <?php if(request()->routeIs('menu*')): ?>
                        class="w-full p-3 font-bold text-green-700 bg-white rounded-lg space-x-2"
                    <?php else: ?>
                        class="w-full p-3 font-bold rounded-lg hover:bg-white hover:text-green-700 space-x-2"
                    <?php endif; ?>
                >
                    <i class="fas fa-utensils"></i>
                    <span>
                        Menus
                    </span>
                </a>
                <?php if(request()->routeIs('recipes*')): ?>
                    <div class="w-full" x-data="{nav: true}">
                        <button class="w-full p-3 font-bold rounded-lg bg-white text-green-700 space-x-2 cursor-pointer text-left" @click="nav = !nav">
                <?php else: ?>
                    <div class="w-full" x-data="{nav: false}" @click.away="nav = false">
                        <button class="w-full p-3 font-bold rounded-lg hover:bg-white hover:text-green-700 space-x-2 cursor-pointer text-left" @click="nav = !nav">
                <?php endif; ?>
                        <i class="fas fa-hamburger"></i>
                        <span>
                            Recipes
                        </span>
                        <span aria-label="Recipes Menu" class="float-right">
                            <i
                                class="fas fa-angle-down text-center cursor-pointer transition transform ease-in-out duration-200"
                                :class="{ 'rotate-180': nav }"
                            ></i>
                        </span>
                    </button>
                    <div :class="{'hidden': !nav}" class="flex flex-col space-y-2 mt-3">
                        <a
                            href="<?php echo e(route('recipes.index')); ?>"
                            <?php if(request()->routeIs('recipes.index')): ?>
                                class="w-full py-2 pl-8 pr-3 font-bold text-green-700 bg-white rounded-lg space-x-2"
                            <?php else: ?>
                                class="w-full py-2 pl-8 pr-3 font-bold rounded-lg hover:bg-white hover:text-green-700 space-x-2"
                            <?php endif; ?>
                        >
                            <i class="fas fa-apple-alt"></i>
                            <span>
                                All Recipes
                            </span>
                        </a>
                        <a
                            href="<?php echo e(route('recipes.create')); ?>"
                            <?php if(request()->routeIs('recipes.create')): ?>
                                class="w-full py-2 pl-8 pr-3 font-bold text-green-700 bg-white rounded-lg space-x-2"
                            <?php else: ?>
                                class="w-full py-2 pl-8 pr-3 font-bold rounded-lg hover:bg-white hover:text-green-700 space-x-2"
                            <?php endif; ?>
                        >
                            <i class="fas fa-plus"></i>
                            <span>
                                Create Recipe
                            </span>
                        </a>
                        <a
                            href="<?php echo e(route('recipes.liked')); ?>"
                            <?php if(request()->routeIs('recipes.liked')): ?>
                                class="w-full py-2 pl-8 pr-3 font-bold text-green-700 bg-white rounded-lg space-x-2"
                            <?php else: ?>
                                class="w-full py-2 pl-8 pr-3 font-bold rounded-lg hover:bg-white hover:text-green-700 space-x-2"
                            <?php endif; ?>
                        >
                            <i class="fas fa-heart"></i>
                            <span>
                                Liked Recipes
                            </span>
                        </a>
                    </div>
                </div>
                <a
                    href="<?php echo e(route('cookie-policy')); ?>"
                    <?php if(request()->routeIs('cookie-policy')): ?>
                        class="w-full p-3 font-bold text-green-700 bg-white rounded-lg space-x-2"
                    <?php else: ?>
                        class="w-full p-3 font-bold rounded-lg hover:bg-white hover:text-green-700 space-x-2"
                    <?php endif; ?>
                >
                    <i class="fas fa-cookie-bite"></i>
                    <span>
                        Cookie Policy
                    </span>
                </a>
            </nav>
            <div class="w-full font-bold lg:hidden" x-data="{ profile: false }" @click.away="profile = false">
                <div class="flex justify-between p-3 items-center" @click="profile = !profile">
                    <p>
                        <?php echo e(Auth::user()->name); ?>

                    </p>
                    <button aria-label="Profile Menu">
                        <i
                            class="fas fa-angle-down text-center cursor-pointer transition transform ease-in-out duration-200"
                            :class="{ 'rotate-180': profile }"
                        ></i>
                    </button>
                </div>
                <div class="w-full font-bold text-green-700 bg-white rounded-lg space-x-2" :class="{ 'hidden': !profile }">
                    <div class="flex flex-col text-left">
                        <a href="<?php echo e(route('profile')); ?>" class="px-3 py-2">
                            Profile
                        </a>
                        <a href="<?php echo e(route('profile.settings.account')); ?>" class="px-3 py-2">
                            Settings
                        </a>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="px-3 py-2 font-bold w-full text-left" aria-label="Logout">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\PHP\Mealing\resources\views/layouts/header.blade.php ENDPATH**/ ?>