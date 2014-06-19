<?php

define ('ROOT', dirname(__FILE__) . '/../');
define('HTTP_SERVER', '{http_server}');
define('HTTP_CATALOG', '{http_server}');

// HTTPS
define('HTTPS_SERVER', '{https_server');
define('HTTPS_CATALOG', '{http_server}');

// DIR
define('DIR_APPLICATION', ROOT . '/admin/');
define('DIR_CLI', ROOT . '/cli/');
define('DIR_SYSTEM', ROOT . '/system/');
define('DIR_DATABASE', ROOT . '/system/database/');
define('DIR_LANGUAGE', ROOT . '/admin/language/');
define('DIR_TEMPLATE', ROOT . '/admin/view/template/');
define('DIR_CONFIG', ROOT . '/system/config/');
define('DIR_IMAGE', ROOT . '/image/');
define('DIR_CACHE', ROOT . '/system/cache/');
define('DIR_DOWNLOAD', ROOT . '/download/');
define('DIR_LOGS', ROOT . '/system/logs/');
define('DIR_CATALOG', ROOT . '/catalog/');

// DB
define('DB_DRIVER', '{sql_driver}');
define('DB_HOSTNAME', '{sql_host}');
define('DB_USERNAME', '{sql_user}');
define('DB_PASSWORD', '{sql_password}');
define('DB_DATABASE', '{sql_database}');
define('DB_PREFIX', '{sql_prefix}');
?>

