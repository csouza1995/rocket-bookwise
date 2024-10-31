<form class="w-full flex space-x-2" x-data x-ref="form">
    <input
        type="text"
        placeholder="Search for books"
        class="w-full p-2 rounded-md text-sm focus:outline-none text-gray-900"
        name="search"
        value="<?= $_REQUEST['search'] ?? '' ?>">

    <!-- select sort -->
    <select name="sort" class="p-2 rounded-md text-sm focus:outline-none text-gray-900" x-on:change="$refs.form.submit()">
        <option value="rating-desc" <?= $_REQUEST['sort'] === 'rating-desc' ? 'selected' : '' ?>>
            Rating Desc
        </option>
        <option value="rating-asc" <?= $_REQUEST['sort'] === 'rating-asc' ? 'selected' : '' ?>>
            Rating Asc
        </option>
        <option value="title-desc" <?= $_REQUEST['sort'] === 'title-desc' ? 'selected' : '' ?>>
            Title Desc
        </option>
        <option value="title-asc" <?= $_REQUEST['sort'] === 'title-asc' ? 'selected' : '' ?>>
            Title Asc
        </option>
    </select>

    <button type="submit" class="text-white p-2 rounded-md hover:bg-gray-700">
        <i class='bx bx-search'></i>
    </button>
</form>