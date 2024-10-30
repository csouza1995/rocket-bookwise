<div class="space-y-4">
    <div class="p-3 rounded-md bg-gray-900 text-gray-200 shadow-lg shadow-gray-800">
        <div class="flex space-x-6">
            <div class="w-1/4">
                <img src="<?= $book->image ?>" alt="book" class="rounded-md h-auto w-full object-cover">
            </div>
            <div class="w-3/4">
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
                        (<?= count($book->reviews) ?> reviews, rating <?= $book->rating ?>)
                    </span>
                </div>

                <p class="text-sm mt-6">
                    <?= $book->description ?>
                </p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-5 gap-4 mt-0">
        <div class="col-span-3 bg-gray-900 p-3 rounded-md">
            <h2 class="text-xl font-semibold text-gray-300 mb-3 border-b border-gray-600 pb-2">
                Reviews
            </h2>

            <?php if (count($book->reviews) > 0) : ?>
                <div class="space-y-4">
                    <?php foreach ($book->reviews as $review) : ?>
                        <div class="p-3 rounded-md bg-gray-800">
                            <div class="flex">
                                <div class="mr-3">
                                    <img src="<?= $review->user->avatar ?? 'https://placehold.co/25x25' ?>"
                                        class="rounded-full h-12 w-12 object-cover">
                                </div>
                                <div>
                                    <p class="text-sm italic">
                                        <?= $review->user->name ?>
                                    </p>
                                    <p>
                                        <?php for ($i = 0; $i < floor($review->rating); $i++) : ?>
                                            <i class='bx bxs-star text-yellow-500'></i>
                                        <?php endfor; ?>
                                        <?php for ($i = 0; $i < 5 - floor($review->rating); $i++) : ?>
                                            <i class='bx bx-star text-gray-300'></i>
                                        <?php endfor; ?>
                                    </p>
                                    <p>
                                        <?= $review->description ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="text-gray-300 text-sm">
                    No reviews yet
                </div>
            <?php endif; ?>
        </div>

        <div class="col-span-2 bg-gray-900 p-3 rounded-md">
            <h2 class="text-xl font-semibold text-gray-300 mb-3 border-b border-gray-600 pb-2">
                Send your review
            </h2>

            <?php if (auth()) : ?>
                <form class=" space-y-6" method="POST" action="/create-reviews">
                    <input type="hidden" name="book_id" value="<?= $book->id ?>">

                    <div class="space-y-2">
                        <label class="text-gray-300 font-bold" for="description">
                            What do you think about this book?
                        </label>

                        <textarea
                            placeholder="Write your review"
                            class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                            name="description"><?= old('description') ?></textarea>

                        <?php if ($error = error('description')) : ?>
                            <div class="text-red-500 text-xs"><?= $error ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="space-y-2" x-data="{ rating: <?= old('rating', 0) ?>, tempRating: 0 }">
                        <label class="text-gray-300 font-bold" for="rating">
                            Rating
                        </label>

                        <input type="hidden" name="rating" x-model="rating">

                        <div class="flex space-x-1 text-2xl" x-on:mouseleave="tempRating = 0">
                            <i class="bx bxs-star text-gray-300 cursor-pointer"
                                :class="{ 'text-yellow-500': rating >= 1 || tempRating >= 1 }"
                                x-on:click="rating = 1"
                                x-on:mouseover="tempRating = 1">
                            </i>

                            <i class="bx bxs-star text-gray-300 cursor-pointer"
                                :class="{ 'text-yellow-500': rating >= 2 || tempRating >= 2 }"
                                x-on:click="rating = 2"
                                x-on:mouseover="tempRating = 2">
                            </i>

                            <i class="bx bxs-star text-gray-300 cursor-pointer"
                                :class="{ 'text-yellow-500': rating >= 3 || tempRating >= 3 }"
                                x-on:click="rating = 3"
                                x-on:mouseover="tempRating = 3">
                            </i>

                            <i class="bx bxs-star text-gray-300 cursor-pointer"
                                :class="{ 'text-yellow-500': rating >= 4 || tempRating >= 4 }"
                                x-on:click="rating = 4"
                                x-on:mouseover="tempRating = 4">
                            </i>

                            <i class="bx bxs-star text-gray-300 cursor-pointer"
                                :class="{ 'text-yellow-500': rating >= 5 || tempRating >= 5 }"
                                x-on:click="rating = 5"
                                x-on:mouseover="tempRating = 5">
                            </i>
                        </div>

                        <?php if ($error = error('password')) : ?>
                            <div class="text-red-500 text-xs"><?= $error ?></div>
                        <?php endif; ?>
                    </div>

                    <button type="submit"
                        class="text-white py-2 px-4 rounded-md hover:bg-gray-700 bg-gray-500 w-full">
                        Send Review
                    </button>
                </form>
            <?php else : ?>
                <div class="text-gray-300 text-sm">
                    You need to be logged in to send a review
                    <a href="/login" class="text-blue-500 hover:underline">Login</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>