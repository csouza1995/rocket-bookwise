<?php

$sql = file_get_contents('database/seeders/data/users.seeder.sql');

$database->exec($sql);
