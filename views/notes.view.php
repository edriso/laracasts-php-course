<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach($notes as $note) : ?>
            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                    <?= htmlspecialchars($note['body']) ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-14">
            <a href="/notes/create" class="text-white bg-blue-500 p-2 rounded hover:bg-blue-400">Create new note</a>
        </p>
    </div>
</main>

<?php require('partials/foot.php') ?>