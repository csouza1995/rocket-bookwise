<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ooops! Error <?= $code ?></title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-800 text-gray-400">
    <div class="flex items-center justify-center h-screen">
        <div class="text-center">
            <?php require ROOT . "/views/errors/{$code}.view.php"; ?>
        </div>
    </div>
</body>

</html>