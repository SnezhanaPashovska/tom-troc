<?php

session_start();

define('TEMPLATE_VIEW_PATH', __DIR__ . '/../views/templates/');
define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php');

define('DB_HOST', 'localhost:8889');
define('DB_NAME', 'tom_troc');
define('DB_USER', 'root');
define('DB_PASS', '');

error_reporting(E_ALL);
ini_set('display_errors', 1);

