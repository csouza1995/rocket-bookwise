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
} else {
    abort(404);
}

view('book', compact('book'));
