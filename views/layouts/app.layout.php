<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Wise</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <li><a href="/login" class="hover:underline">Login</a></li>
            </ul>
        </nav>
    </header>

    <main class="mx-auto max-w-screen-lg space-y-10 lg:px-0 px-4 pt-10">
        <?php require "views/{$view}.view.php"; ?>
    </main>
</body>

</html>