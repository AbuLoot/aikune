<?php

header('Content-Type: text/html; charset=utf-8');

session_start();

ini_set('display_errors', 'On');

define('APP_ROOT', __DIR__);
define('BASE_URL', 'http://aikune.kz');
define('VIEW_ROOT', APP_ROOT . '/views');

// $db = new PDO('mysql:host=srv-db-plesk06.ps.kz:3306;dbname=aikunekz_data', 'aikun_user', 'k&k3Sw22');
$db = new PDO('mysql:host=localhost;dbname=aikune', 'bigstore_user', 'secret');

require 'functions.php';
