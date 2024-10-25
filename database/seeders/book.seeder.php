<?php

$sql = file_get_contents('database/seeders/data/books.seeder.sql');

$database->exec($sql);
