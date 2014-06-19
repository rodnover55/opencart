<?php
// Version
define('VERSION', '1.5.6.4');

// Configuration
if (file_exists(dirname(__FILE__) . '/config.php')) {
    require_once (dirname(__FILE__) . '/config.php');
} else {
    echo 'Open cart not install. Please install opencart';
    exit;
}

// Startup
require_once (DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'engine/clicontroller.php');

// Application Classes
require_once (DIR_SYSTEM . 'library/currency.php');
require_once (DIR_SYSTEM . 'library/user.php');
require_once (DIR_SYSTEM . 'library/weight.php');
require_once (DIR_SYSTEM . 'library/length.php');
require_once (DIR_CLI . 'engine/CLIAction.php');

// Registry
$registry = new Registry();

// Loader
$loader = new Loader($registry);
$registry->set('load', $loader);

// Config
$config = new Config();
$registry->set('config', $config);

// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$registry->set('db', $db);

// Settings
$query = $db->query("SELECT * FROM " . DB_PREFIX . "setting WHERE store_id = '0'");

foreach ($query->rows as $setting) {
    if (!$setting['serialized']) {
        $config->set($setting['key'], $setting['value']);
    } else {
        $config->set($setting['key'], unserialize($setting['value']));
    }
}

// Log
$log = new Log($config->get('config_error_filename'));
$registry->set('log', $log);

function cliEcho($str) {
    echo $str . "\n";
}

function error_handler($errno, $errstr, $errfile, $errline) {
    global $log, $config;

    switch ($errno) {
        case E_NOTICE:
        case E_USER_NOTICE:
            $error = 'Notice';
            break;
        case E_WARNING:
        case E_USER_WARNING:
            $error = 'Warning';
            break;
        case E_ERROR:
        case E_USER_ERROR:
            $error = 'Fatal Error';
            break;
        default:
            $error = 'Unknown';
            break;
    }

    if ($config->get('config_error_display')) {
        cliEcho(sprintf('[%s]: "%s" in "%s" on line %d', $error, $errstr, $errfile, $errline));
    }
//
//    if ($config->get('config_error_log')) {
//        $log->write('PHP ' . $error . ':  ' . $errstr . ' in ' . $errfile . ' on line ' . $errline);
//    }

    return true;
}

// Error Handler
set_error_handler('error_handler');

// Cache
$cache = new Cache();
$registry->set('cache', $cache);

// Language
$languages = array();

$language = $db->table('language');
$query = $db->query("SELECT * FROM `{$labora}`");

foreach ($query->rows as $result) {
    $languages[$result['code']] = $result;
}

$config->set('config_language_id', $languages[$config->get('config_admin_language')]['language_id']);

// Language	
$language = new Language($languages[$config->get('config_admin_language')]['directory']);
$language->load($languages[$config->get('config_admin_language')]['filename']);
$registry->set('language', $language);

//// Currency
$registry->set('currency', new Currency($registry));

// Weight
$registry->set('weight', new Weight($registry));

// Length
$registry->set('length', new Length($registry));

// Front Controller
$controller = new Front($registry);

if ($argc > 1) {
    $route = $argv[1];
}

// Router
if (isset($route)) {
    $action = new CLIAction($route);
} else {
    // TODO: Show help message
    $action = new CLIAction('common/help');
}

// Dispatch
$controller->dispatch($action, new CLIAction('common/not_found'));

cliEcho("\nEnd executing script. Exit.");
?>