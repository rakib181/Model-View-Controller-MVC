<?php use Core\Session;

require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<main>
    <div class="flex min-h-full flex-col justify-center px-6 py-5 lg:px-5">
        <?php
            if(!empty($success)) {
                echo "<p class='mb-5 text-center text-green-500'>".$success['success']."</p>";
            }
            if(!empty($errors['message'])) {
                echo "<p class='mb-5 text-center text-red-500'>".$errors['message']."</p>";
            }
        ?>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create a New Account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/registration" method="POST">
                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                    <div class="mt-2">
                        <input type="text" name="name" id="name" autocomplete="name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                        value="<?= old('name') ?>">
                    </div>
                    <?php if(!empty(Session::get('errors')['name'])) : ?>
                        <p class="text-red-500 text-xs mt-3"><?= Session::get('errors')['name'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                               value="<?= old('email') ?>">
                    </div>
                    <?php if(!empty(Session::get('errors')['email'])) : ?>
                        <p class="text-red-500 text-xs mt-3"><?= Session::get('errors')['email'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    <?php if(!empty(Session::get('errors')['password'])) : ?>
                        <p class="text-red-500 text-xs mt-3"><?= Session::get('errors')['password'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                </div>
            </form>
        </div>
    </div>

</main>
<?php require base_path('views/partials/footer.php'); ?>
