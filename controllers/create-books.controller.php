<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST' || !auth()) {
    redirectBack();
}

$validator = Validator::validate([
    'title' => ['required', 'max:255', 'min:3'],
    'author' => ['required', 'max:255'],
    'genre' => ['required', 'max:255'],
    'num_pages' => ['required', 'numeric'],
    'published_year' => ['required', 'numeric', 'min:1900', 'max:' . date('Y')],
    'description' => ['required'],
], $_POST, [
    'title' => 'Title',
    'author' => 'Author',
    'genre' => 'Genre',
    'num_pages' => 'Number of pages',
    'published_year' => 'Published year',
    'description' => 'Description',
]);

if (!$validator->isValid()) {
    Session::flash('errors', $validator->getErrors());
    Session::flash('old', $_POST);

    Session::flash('message::error', 'Please check your form for errors');

    redirectBack();
}

$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$numPages = $_POST['num_pages'];
$publishedYear = $_POST['published_year'];
$description = $_POST['description'];

$imagePath = 'https://placehold.co/500x400';

if ($_FILES['image-file']) {
    $imagePath = Storage::store($_FILES['image-file'], 'images/books/');
} elseif ($_POST['image-url']) {
    $imagePath = $_POST['image-url'];
}

$book = $database
    ->query(
        'SELECT * FROM books WHERE title = :title AND author = :author',
        [
            'title' => $title,
            'author' => $author,
        ],
    )
    ->fetch();

if ($book) {
    Session::flash('message::error', 'Book already exists');
    redirectBack();
}

$database->query(
    'INSERT INTO books (title, author, genre, rating, num_pages, published_year, description, user_id, image) VALUES (:title, :author, :genre, :rating, :num_pages, :published_year, :description, :user_id, :image)',
    [
        'title' => $title,
        'author' => $author,
        'genre' => $genre,
        'rating' => 0,
        'num_pages' => $numPages,
        'published_year' => $publishedYear,
        'description' => $description,
        'user_id' => auth()->id,
        'image' => $imagePath,
    ]
);

Session::flash('message::success', 'Book created successfully');

redirect("my-books");
