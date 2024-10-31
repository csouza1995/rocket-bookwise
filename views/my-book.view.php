<!-- search -->
<?php require 'partials/_search.php'; ?>

<!-- books list -->
<div class="grid grid-cols-5 gap-4 mt-0">
    <div class="col-span-3 bg-gray-900 p-3 rounded-md">
        <h2 class="text-xl font-semibold text-gray-300 mb-3 border-b border-gray-600 pb-2">
            Books
        </h2>

        <?php if (count($books) > 0) : ?>
            <div class="space-y-4 overflow-y-auto max-h-[75vh]">
                <?php foreach ($books as $book) : ?>
                    <div class="p-3 rounded-md bg-gray-800">
                        <?php require 'partials/_book.php'; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="text-gray-300 text-sm">
                No books found
            </div>
        <?php endif; ?>
    </div>

    <div class="col-span-2 bg-gray-900 p-3 rounded-md h-full">
        <h2 class="text-xl font-semibold text-gray-300 mb-3 border-b border-gray-600 pb-2">
            Add Book
        </h2>

        <?php if (auth()) : ?>
            <form class=" space-y-6" method="POST" action="/create-books" enctype="multipart/form-data">
                <div class="space-y-2">
                    <label class="text-gray-300 font-bold" for="description">
                        Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                        placeholder="Title"
                        value="<?= old('title') ?>">

                    <?php if ($error = error('title')) : ?>
                        <div class="text-red-500 text-xs"><?= $error ?></div>
                    <?php endif; ?>
                </div>

                <div class="space-y-2">
                    <label class="text-gray-300 font-bold" for="description">
                        Author
                    </label>

                    <input
                        type="text"
                        name="author"
                        class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                        placeholder="Author"
                        value="<?= old('author') ?>">

                    <?php if ($error = error('author')) : ?>
                        <div class="text-red-500 text-xs"><?= $error ?></div>
                    <?php endif; ?>
                </div>

                <div class="space-y-2">
                    <label class="text-gray-300 font-bold" for="description">
                        Genre
                    </label>

                    <input
                        type="text"
                        name="genre"
                        class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                        placeholder="Genre"
                        list="genres"
                        value="<?= old('genre') ?>">

                    <datalist id="genres">
                        <?php foreach ($genres as $genre) : ?>
                            <option value="<?= $genre->genre ?>">
                            <?php endforeach; ?>
                    </datalist>

                    <?php if ($error = error('genre')) : ?>
                        <div class="text-red-500 text-xs"><?= $error ?></div>
                    <?php endif; ?>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-gray-300 font-bold" for="description">
                            Number of pages
                        </label>

                        <input
                            type="number"
                            name="num_pages"
                            class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                            placeholder="Number of pages"
                            min="1"
                            value="<?= old('num_pages') ?>">

                        <?php if ($error = error('num_pages')) : ?>
                            <div class="text-red-500 text-xs"><?= $error ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="space-y-2">
                        <label class="text-gray-300 font-bold" for="description">
                            Published year
                        </label>

                        <input
                            type="number"
                            name="published_year"
                            class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                            placeholder="Published year"
                            min="1900"
                            max="<?= date('Y') ?>"
                            value="<?= old('published_year', date('Y')) ?>">

                        <?php if ($error = error('published_year')) : ?>
                            <div class="text-red-500 text-xs"><?= $error ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-gray-300 font-bold" for="description">
                        Description
                    </label>

                    <textarea
                        name="description"
                        class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                        placeholder="Description"><?= old('description') ?></textarea>

                    <?php if ($error = error('description')) : ?>
                        <div class="text-red-500 text-xs"><?= $error ?></div>
                    <?php endif; ?>
                </div>

                <div class="space-y-2" x-data="{ image: null, mode: 'file' }">
                    <label class="flex w-full justify-between text-gray-300 font-bold" for="description">
                        Image

                        <!-- toggle -->
                        <div class="flex">
                            <!-- btn url -->
                            <button
                                type="button"
                                class="text-white py-1 px-4 rounded-l-md hover:bg-gray-700 bg-gray-500 text-nowrap text-xs"
                                x-bind:class="{ 'bg-gray-700': mode === 'url' }"
                                x-on:click="mode = 'url'">
                                URL
                            </button>

                            <!-- btn file -->
                            <button
                                type="button"
                                class="text-white py-1 px-4 rounded-r-md hover:bg-gray-700 bg-gray-500 text-nowrap text-xs"
                                x-bind:class="{ 'bg-gray-700': mode === 'file' }"
                                x-on:click="mode = 'file'">
                                File
                            </button>
                        </div>
                    </label>

                    <div x-show="mode === 'file'">

                        <input
                            x-ref="image"
                            type="file"
                            name="image-file"
                            class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900 hidden"
                            x-on:change="image = $event.target.files[0]"
                            :disabled="mode === 'url'"
                            accept="image/*">

                        <div class="flex items-center space-x-2">
                            <button type="button"
                                class="text-white py-2 px-4 rounded-md hover:bg-gray-700 bg-gray-500 text-nowrap"
                                x-on:click="$refs.image.click()">
                                Select Image
                            </button>

                            <p
                                class="text-gray-300 text-sm truncate"
                                x-text="image ? image.name : 'No file selected'"></p>

                        </div>
                    </div>

                    <div x-show="mode === 'url'">

                        <input
                            type="text"
                            name="image-url"
                            class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
                            placeholder="Image URL"
                            :disabled="mode === 'file'"
                            value="<?= old('image-url') ?>">

                    </div>

                    <?php if ($error = error('image')) : ?>
                        <div class="text-red-500 text-xs"><?= $error ?>
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit"
                    class="text-white py-2 px-4 rounded-md hover:bg-gray-700 bg-gray-500 w-full">
                    Save
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