<?php

$search = $_REQUEST['search'] ?? '';

$books = $database
    ->query(
        "SELECT * FROM books WHERE title LIKE :search OR author LIKE :search",
        ['search' => "%$search%"],
        Book::class
    )
    ->fetchAll();

view('index', compact('books'));
