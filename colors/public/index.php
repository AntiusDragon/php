<?php
use Colors\App\App;
use Colors\App\Message;

session_start();

define('DB', 'maria'); // file

require '../vendor/autoload.php';
define('ROOT', __DIR__ . '/../');
define('URL', 'http://super-colors.test');
Message::get();

echo App::run();