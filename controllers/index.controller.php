<?php

// search
$search = $_REQUEST['search'] ?? '';

// sort
$sortParameters = explode('-', strtolower($_REQUEST['sort'] ?? 'rating-desc'));

$sortParameters[0] = match ($sortParameters[0]) {
    'rating' => 'rating ',
    'author' => 'author ',
    default => 'title ',
};

$sortParameters[1] = match ($sortParameters[1]) {
    'desc' => ' DESC',
    default => ' ASC',
};

// query
$books = $database
    ->query(
        "SELECT * FROM books WHERE title LIKE :search OR author LIKE :search ORDER BY " . implode(" ", $sortParameters),
        [
            'search' => "%$search%",
        ],
        Book::class
    )
    ->fetchAll();

view('index', compact('books'));
