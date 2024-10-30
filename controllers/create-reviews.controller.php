<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST' || !auth()) {
    redirectBack();
}

$bookId = $_POST['book_id'];

$validator = Validator::validate([
    'book_id' => ['required', 'numeric', 'exists:books,id'],
    'description' => ['required'],
    'rating' => ['required', 'numeric', 'min:1', 'max:5'],
], $_POST, [
    'book_id' => 'ID Book',
    'description' => 'About the book',
    'rating' => 'Rating',
]);

if (!$validator->isValid()) {
    Session::flash('errors', $validator->getErrors());
    Session::flash('old', $_POST);

    Session::flash('message::error', 'Please check your form for errors');

    redirectBack();
}

$description = $_POST['description'];
$rating = $_POST['rating'];

$review = $database
    ->query(
        'SELECT * FROM reviews WHERE user_id = :user_id AND book_id = :book_id',
        [
            'user_id' => auth()->id,
            'book_id' => $bookId,
        ],
        Review::class
    )
    ->fetch();

if ($review) {
    $database->query(
        'UPDATE reviews SET rating = :rating, description = :description WHERE id = :id',
        [
            'id' => $review->id,
            'rating' => $rating,
            'description' => $description,
        ]
    );
} else {
    $database->query(
        'INSERT INTO reviews (user_id, book_id, rating, description) VALUES (:user_id, :book_id, :rating, :description)',
        [
            'user_id' => auth()->id,
            'book_id' => $bookId,
            'rating' => $rating,
            'description' => $description,
        ]
    );
}

// Update the book rating
$bookRating = $database
    ->query(
        'SELECT AVG(rating) as rating FROM reviews WHERE book_id = :book_id',
        ['book_id' => $bookId]
    )
    ->fetch();

$database->query(
    'UPDATE books SET rating = :rating WHERE id = :id',
    [
        'id' => $bookId,
        'rating' => round($bookRating->rating, 1),
    ]
);

Session::flash('message::success', 'Review created successfully');

redirect("book?id=$bookId");
