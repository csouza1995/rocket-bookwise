<div class="p-3 rounded-md bg-gray-900 text-gray-200 shadow-lg shadow-gray-800">
    <div class="flex space-x-4">
        <div class="w-1/3">
            <img src="<?= $book->image ?>" alt="book" class="rounded-md h-24 w-full object-cover">
        </div>
        <div class="w-2/3">
            <a href="/book.php?id=<?= $book->id ?>" class="font-semibold text-lg hover:underline block">
                <?= $book->title ?>
            </a>

            <p class="text-sm italic">
                <?= $book->author ?>
            </p>

            <p class="text-xs italic">
                <?= $book->genre ?>
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
                    (<?= $book->rating ?>)
                </span>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <?= $book->description ?>
    </div>
</div>