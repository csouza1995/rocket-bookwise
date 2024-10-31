<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Wise</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-800 text-gray-400">
    <header class=" bg-gray-900 shadow-lg shadow-gray-900 lg:px-0 px-4">
        <nav class="mx-auto max-w-screen-lg flex justify-between py-4">
            <div class="font-bold text-xl tracking-wide">Book Wise</div>
            <ul class="flex space-x-4">
                <li><a href="/" class="text-sky-500">Explore</a></li>
                <li><a href="/my-books" class="hover:underline">My Books</a></li>
            </ul>
            <ul>
                <?php if (auth()) : ?>
                    <li x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open" class="hover:underline">
                            <?= auth()->getFullname() ?>
                        </button>
                        <ul x-show="open" @click.away="open = false" class="absolute bg-gray-800 mt-2 py-2 rounded-lg shadow-lg">
                            <li><a href="/profile" class="block px-4 py-2 hover:bg-gray-700">Profile</a></li>
                            <li><a href="/logout" class="block px-4 py-2 hover:bg-gray-700">Logout</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><a href="/login" class="hover:underline">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main class="mx-auto max-w-screen-lg space-y-10 lg:px-0 px-4 pt-10">
        <!-- messages -->
        <?php if ($successMessage = Session::get('message::success')) : ?>
            <div class="bg-green-700 text-green-200 p-4 rounded-md mb-5" x-data="{ show: true }" x-show="show">
                <?= $successMessage ?>

                <button x-on:click="show = false"
                    class="right-0 top-0 hover:bg-green-800 rounded-md float-right">
                    <i class='bx bx-x'></i>
                </button>
            </div>
        <?php endif; ?>

        <?php if ($errorMessage = Session::get('message::error')) : ?>
            <div class="bg-red-700 text-red-200 p-4 rounded-md mb-5" x-data="{ show: true }" x-show="show">
                <?= $errorMessage ?>

                <button x-on:click="show = false"
                    class="right-0 top-0 hover:bg-red-800 rounded-md float-right">
                    <i class='bx bx-x'></i>
                </button>
            </div>
        <?php endif; ?>

        <!-- content -->
        <?php require ROOT . "/views/{$view}.view.php"; ?>
    </main>
</body>

</html>