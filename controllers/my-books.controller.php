<?php

if (!auth()) {
    redirect('login');
}

// parameters
$search = $_REQUEST['search'] ?? '';
$sort = $_REQUEST['sort'] ?? 'rating-desc';

// query
$books = Book::my(auth()->id, $search, $sort);

// genres
$genres = $database
    ->query(
        "SELECT DISTINCT genre FROM books",
    )
    ->fetchAll();

view('my-book', compact('books', 'genres'));
