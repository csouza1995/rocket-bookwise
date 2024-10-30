<?php

if ($id = $_REQUEST['id']) {
    $book = $database
        ->query(
            "SELECT * FROM books WHERE id = :id LIMIT 1",
            ['id' => $id],
            Book::class
        )
        ->fetch();

    if (!$book) {
        abort(404);
    }

    $book->reviews = $database
        ->query(
            "SELECT * FROM reviews WHERE book_id = :book_id",
            ['book_id' => $book->id],
            Review::class
        )
        ->fetchAll();
} else {
    abort(404);
}

view('book', compact('book'));
