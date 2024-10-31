<?php

$sql = file_get_contents('database/seeders/data/books.seeder.sql');

$database->exec($sql);

$users = $database->query('SELECT * FROM users')->fetchAll();
$books = $database->query('SELECT * FROM books')->fetchAll();

foreach ($books as $book) {
    $database->query(
        'UPDATE books SET user_id = :user_id WHERE id = :id',
        [
            'user_id' => $users[array_rand($users)]->id,
            'id' => $book->id,
        ],
    );
}

echo 'Books seeded successfully' . PHP_EOL;
