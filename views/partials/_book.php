<div class="flex space-x-6">
    <div class="w-1/4">
        <img src="<?= $book->getImage() ?>" alt="book" class="rounded-md h-auto w-full object-cover">
    </div>
    <div class="w-3/4">
        <a href="/book?id=<?= $book->id ?>" class="font-semibold text-lg hover:underline block">
            <?= $book->title ?>
        </a>

        <p class="text-sm italic">
            <?= $book->author ?>
        </p>

        <p class="text-xs italic">
            <?= $book->genre ?>, <?= $book->num_pages ?> pages, published in <?= $book->published_year ?>
        </p>

        <div class="flex italic items-center">
            <div class="mr-3">
                <?php for ($i = 0; $i < floor($book->rating); $i++) : ?>
                    <i class='bx bxs-star text-yellow-500'></i>
                <?php endfor; ?>
                <?php for ($i = 0; $i < 5 - floor($book->rating); $i++) : ?>
                    <i class='bx bx-star text-gray-300'></i>
                <?php endfor; ?>
            </div>

            <span class="text-xs">
                (<?= $book->review_count ?> reviews, rating <?= $book->rating ?>)
            </span>
        </div>

        <p class="text-sm mt-6">
            <?= $book->description ?>
        </p>
    </div>
</div>