<?php

class Review
{
    public ?int $id;
    public ?int $user_id;
    public ?int $book_id;
    public ?int $rating;
    public ?string $description;
    public ?string $created_at;
    public ?string $updated_at;
}
