<?php

// set ROOT to ../
define('ROOT', dirname(__DIR__ . '/../../'));

require ROOT . "/functions.php";

require ROOT . "/sessions/Session.php";
require ROOT . "/database/Database.php";
require ROOT . "/storage/Storage.php";
require ROOT . "/validators/Validator.php";

require ROOT . "/models/Book.php";
require ROOT . "/models/User.php";
require ROOT . "/models/Review.php";

Session::start();

require ROOT . "/routes.php";
