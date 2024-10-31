<?php

// parameters
$search = $_REQUEST['search'] ?? '';
$sort = $_REQUEST['sort'] ?? 'rating-desc';

// query
$books = Book::all($search, $sort);

view('index', compact('books'));
