<?php

require "functions.php";

require "sessions/Session.php";
require "database/Database.php";
require "validators/Validator.php";

require "models/Book.php";
require "models/User.php";
require "models/Review.php";

Session::start();

require "routes.php";
