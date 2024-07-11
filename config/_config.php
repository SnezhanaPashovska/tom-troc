<?php

session_start();

require __DIR__ . '/../load_env.php';

define('TEMPLATE_VIEW_PATH', __DIR__ . '/../views/templates/');
define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php');

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);

error_reporting(E_ALL);
ini_set('display_errors', 1);
