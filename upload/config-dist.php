<?php
define ('ROOT', dirname(__FILE__));

// HTTP
define('HTTP_SERVER', '{http_server}');
define('HTTP_IMAGE', '{http_server}image/');
define('HTTP_ADMIN', '{http_server}admin/');

// HTTPS
define('HTTPS_SERVER', '{http_server}');
define('HTTPS_IMAGE', '{http_server}image/');

// DIR
define('DIR_APPLICATION', ROOT . '/catalog/');
define('DIR_SYSTEM', ROOT . '/system/');
define('DIR_DATABASE', ROOT . '/system/database/');
define('DIR_LANGUAGE', ROOT . '/catalog/language/');
define('DIR_TEMPLATE', ROOT . '/catalog/view/theme/');
define('DIR_CONFIG', ROOT . '/system/config/');
define('DIR_IMAGE', ROOT . '/opencart/image/');
define('DIR_CACHE', ROOT . '/system/cache/');
define('DIR_DOWNLOAD', ROOT . '/download/');
define('DIR_LOGS', ROOT . '/system/logs/');

// DB
define('DB_DRIVER', '{sql_driver}');
define('DB_HOSTNAME', '{sql_host}');
define('DB_USERNAME', '{sql_user}');
define('DB_PASSWORD', '{sql_password}');
define('DB_DATABASE', '{sql_database}');
define('DB_PREFIX', '{sql_prefix}');
?>