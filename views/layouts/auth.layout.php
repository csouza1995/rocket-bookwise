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
    <main class="mx-auto max-w-screen-lg space-y-10 lg:px-0 px-4 pt-10">
        <?php require "views/{$view}.view.php"; ?>
    </main>
</body>

</html>