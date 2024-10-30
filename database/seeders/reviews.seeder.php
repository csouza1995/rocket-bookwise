<?php

$users = $database->query('SELECT * FROM users')->fetchAll();
$books = $database->query('SELECT * FROM books')->fetchAll();

foreach ($books as $book) {
    foreach ($users as $user) {
        $database->query(
            'INSERT INTO reviews (user_id, book_id, rating, description) VALUES (:user_id, :book_id, :rating, :description)',
            [
                'user_id' => $user->id,
                'book_id' => $book->id,
                'rating' => rand(1, 5),
                'description' => 'This is a review for ' . $book->title,
            ]
        );
    }

    $bookRating = $database
        ->query(
            'SELECT AVG(rating) as rating FROM reviews WHERE book_id = :book_id',
            ['book_id' => $book->id]
        )
        ->fetch();

    $database->query(
        'UPDATE books SET rating = :rating WHERE id = :id',
        [
            'id' => $book->id,
            'rating' => round($bookRating->rating, 1),
        ]
    );
}

echo 'Reviews seeded successfully' . PHP_EOL;
