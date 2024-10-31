<?php

$seeders = [
    'database/seeders/user.seeder.php',
    'database/seeders/book.seeder.php',
    'database/seeders/reviews.seeder.php',
];

foreach ($seeders as $seeder) {
    require $seeder;
}
