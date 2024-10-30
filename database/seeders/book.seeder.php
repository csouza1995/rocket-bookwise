<?php

$sql = file_get_contents('database/seeders/data/books.seeder.sql');

$database->exec($sql);

echo 'Books seeded successfully' . PHP_EOL;
