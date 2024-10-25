<?php

$seeders = [
    'database/seeders/book.seeder.php',
    'database/seeders/user.seeder.php',
];

foreach ($seeders as $seeder) {
    require $seeder;
}
