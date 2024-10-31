<?php

if ($id = $_REQUEST['id']) {
    $book = Book::get($id);

    if (!$book) {
        abort(404);
    }

    $reviews = $database
        ->query(
            "SELECT 
                reviews.*,
                users.name || ' ' || users.surname as user_name
                -- users.image as user_image
            FROM reviews 
            LEFT JOIN users ON reviews.user_id = users.id
            WHERE book_id = :book_id",
            ['book_id' => $id],
            Review::class
        )
        ->fetchAll();
} else {
    abort(404);
}

view('book', compact('book', 'reviews'));
