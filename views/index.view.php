<!-- search -->
<form class="w-full flex space-x-2">
    <input
        type="text"
        placeholder="Search for books"
        class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
        name="search"
        value="<?= $_REQUEST['search'] ?? '' ?>">

    <!-- select sort -->
    <select name="sort" class="p-2 rounded-md text-sm focus:outline-none text-gray-900">
        <option value="rating-asc" <?= $_REQUEST['sort'] === 'rating-asc' ? 'selected' : '' ?>>
            Rating Asc
        </option>
        <option value="rating-desc" <?= $_REQUEST['sort'] === 'rating-desc' ? 'selected' : '' ?>>
            Rating Desc
        </option>
        <option value="title-asc" <?= $_REQUEST['sort'] === 'title-asc' ? 'selected' : '' ?>>
            Title Asc
        </option>
        <option value="title-desc" <?= $_REQUEST['sort'] === 'title-desc' ? 'selected' : '' ?>>
            Title Desc
        </option>
    </select>

    <button type="submit" class="text-white p-2 rounded-md hover:bg-gray-700">
        <i class='bx bx-search'></i>
    </button>
</form>

<!-- books list -->
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php foreach ($books as $book) : ?>
        <div class="p-3 rounded-md bg-gray-900 text-gray-200 shadow-lg shadow-gray-800">
            <div class="flex space-x-4">
                <div class="w-1/3">
                    <img src="<?= $book->image ?>" alt="book" class="rounded-md h-24 w-full object-cover">
                </div>
                <div class="w-2/3">
                    <a href="/book?id=<?= $book->id ?>" class="font-semibold text-lg hover:underline block">
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
    <?php endforeach; ?>
</section>