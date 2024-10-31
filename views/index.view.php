<!-- search -->
<?php require 'partials/_search.php'; ?>


<!-- books list -->
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
    <?php foreach ($books as $book) : ?>
        <div class="p-3 rounded-md bg-gray-900 text-gray-200 shadow-lg shadow-gray-800">
            <?php require 'partials/_book.php'; ?>
        </div>
    <?php endforeach; ?>
</section>