<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
             <h1 class="text-blue-500 text-center">Hello, <?= $_SESSION['user']['name'] ?? "Guest!" ?> ,Welcome to Home</h1>
        </div>
    </main>
<?php require base_path('views/partials/footer.php'); ?>