<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('views/partials/nav.php')) ?>
<?php require(base_path('views/partials/banner.php')) ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-4">
            <a href="/notes" class="text-blue-500 hover:underline">go back...</a>
        </p>
        <p><?= htmlspecialchars($note['body']) ?></p>

        <form method="POST" class="mt-6">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button type="submit" class="text-sm text-red-500">Delete</button>
            <a href="/note/edit?id=<?= $note['id'] ?>" class="ml-4 text-blue-500 hover:underline">Edit</a>
        </form>
    </div>
</main>

<?php require(base_path('views/partials/foot.php')) ?>