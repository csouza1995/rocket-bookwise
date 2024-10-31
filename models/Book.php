<?php

class Book
{
    public ?int $id;
    public ?string $title;
    public ?string $author;
    public ?string $genre;
    public ?float $rating;
    public ?int $num_pages;
    public ?int $published_year;
    public ?string $image;
    public ?string $description;

    public function query(array $where = [], array $params = [], $order = 'title ASC')
    {
        $database = new Database(config('database'));

        return $database
            ->query(
                "SELECT 
                books.*, 
                COUNT(reviews.id) as review_count
            FROM books 
            LEFT JOIN reviews ON books.id = reviews.book_id
            WHERE " . implode(" AND ", $where) . " 
            GROUP BY books.id 
            ORDER BY $order",
                $params,
                Book::class
            );
    }

    public static function get(int $id): ?Book
    {
        return (new self)
            ->query(
                ['books.id = :id'],
                ['id' => $id],

            )
            ->fetch();
    }

    public static function my(int $userId, string $search = '', string $order = '')
    {
        return (new self)
            ->query(
                ['(books.title LIKE :search OR books.author LIKE :search)', 'books.user_id = :user_id'],
                ['search' => "%$search%", 'user_id' => $userId],
                self::makeOrder($order)
            )
            ->fetchAll();
    }

    public static function all(string $search = '', string $order = '')
    {
        return (new self)
            ->query(
                ['(books.title LIKE :search OR books.author LIKE :search)'],
                ['search' => "%$search%"],
                self::makeOrder($order)
            )
            ->fetchAll();
    }

    public static function makeOrder(string $order): string
    {
        $sortParameters = explode('-', strtolower($order));

        $sortParameters[0] = match ($sortParameters[0]) {
            'rating' => 'rating ',
            'author' => 'author ',
            default => 'title ',
        };

        $sortParameters[1] = match ($sortParameters[1]) {
            'desc' => ' DESC',
            default => ' ASC',
        };

        return implode(" ", $sortParameters);
    }

    public function getImage(): string
    {
        // when url just return it
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        // when image exists in storage, make it as base64
        return Storage::base64($this->image) ?? 'https://placehold.co/500x400';
    }
}
