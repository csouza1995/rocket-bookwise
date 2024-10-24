<?php

require 'data/books.data.php';

if ($id = $_REQUEST['id']) {
    $bookIndex = array_search($id, array_column($books, 'id'));

    if ($bookIndex === false) {
        abort(404);
    }

    $book = $books[$bookIndex];
} else {
    abort(404);
}

view('book', compact('book'));
