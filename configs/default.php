<?php
// base path
define('BASE_PATH', dirname(dirname(__FILE__)));

// load required Dependencies
require_once BASE_PATH . '/configs/loader.php';
require_once BASE_PATH . '/libs/MysqliDb.php';
require_once BASE_PATH . '/configs/dbConnection.php';

// ssl ?
$ssl = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off';
$ssl_url = $ssl ? 'https://' : 'http://';

define('BASE_URL', $ssl_url . env('MAIN_HOST'));
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));

function dbInstance()
{
    $db = MySqliDb::getInstance();
    if ($db != null) {
        return $db;
    }
    return new MysqliDb(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_NAME'));
}
