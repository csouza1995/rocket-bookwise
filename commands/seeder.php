<?php

require "functions.php";
require 'database/Database.php';

// get params from command line
$name = array_values(array_filter($argv, function ($arg) {
    return strpos($arg, '--name=') !== false;
}))[0] ?? false;

$name = $name !== false ? (int) explode('=', $name)[1] : 0;

if (!$name) {
    $name = 'main';
}

// check if seeder exists
if (!file_exists('database/seeders/' . $name . '.seeder.php')) {
    echo 'Seeder not found' . PHP_EOL;
    exit;
}

// require seeder
require 'database/seeders/' . $name . '.seeder.php';

echo 'Seeder executed successfully' . PHP_EOL;
