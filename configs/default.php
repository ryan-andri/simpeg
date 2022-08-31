<?php
// base path
define('BASE_PATH', dirname(dirname(__FILE__)));

// load required Dependencies
require_once BASE_PATH . '/configs/loader.php';
require_once BASE_PATH . '/configs/dbConnection.php';

// ssl ?
$ssl = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off';
$ssl_url = $ssl ? 'https://' : 'http://';

define('BASE_URL', $ssl_url . env('MAIN_HOST'));
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));
