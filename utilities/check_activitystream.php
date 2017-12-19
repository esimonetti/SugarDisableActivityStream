<?php

// Enrico Simonetti
// enricosimonetti.com

function usage($error = '') {
    if(!empty($error)) print(PHP_EOL . 'Error: ' . $error . PHP_EOL);
    print('  php ' . __FILE__ . ' --instance /full/path' . PHP_EOL);
    exit(1);
}

// only allow CLI
$sapi_type = php_sapi_name();
if (substr($sapi_type, 0, 3) != 'cli') {
    die(__FILE__ . ' is CLI only.');
}

// get command line params
$o = getopt('', array('instance:'));
if (!$o) usage();

// find folder
if(!empty($o['instance']) && is_dir($o['instance'])) {
    print('Debug: Entering folder ' . $o['instance'] . PHP_EOL);
    chdir($o['instance']);
} else {
    chdir(dirname(__FILE__));
}

if(!file_exists('config.php') || !file_exists('sugar_version.php')) {
    usage('The provided folder is not a Sugar system');
}

if(extension_loaded('xdebug')) {
    echo 'Xdebug is enabled on this system. It is highly recommended to disable Xdebug on PHP CLI before running this script. Xdebug will cause unwanted slowness.'.PHP_EOL;
}

// temporarily stop xdebug, xhprof and tideways if enabled
if(function_exists('xdebug_disable')) {
    xdebug_disable();
}
if(function_exists('xhprof_disable')) {
    xhprof_disable();
    xhprof_sample_disable();
}
if(function_exists('tideways_disable')) {
    tideways_disable();
}

// sugar basic setup
define('sugarEntry', true);
require_once('include/entryPoint.php');

if(empty($current_language)) {
    $current_language = $sugar_config['default_language'];
}

$app_list_strings = return_app_list_strings_language($current_language);
$app_strings = return_application_language($current_language);
$mod_strings = return_module_language($current_language, 'Administration');

global $current_user;
$current_user = BeanFactory::getBean('Users');
$current_user->getSystemUser();

$start_time = microtime(true);

echo 'Checking modules with Activities Stream enabled...' . PHP_EOL;

$full_module_list = array_merge($beanList, $app_list_strings['moduleList']);

$modules_enabled = array();
foreach($full_module_list as $module => $value) {
    $bean = BeanFactory::newBean($module);
    if(!empty($dictionary[$bean->object_name]) && !empty($dictionary[$bean->object_name]['activity_enabled'])) {
        if(empty($modules_enabled[$module])) {
            $modules_enabled[$module] = $bean->object_name;
        } else {
            echo 'Duplicate module: '.$module.' with object name: '.$bean->object_name.PHP_EOL;
        }
    }
}

asort($modules_enabled);
var_export($modules_enabled);

echo PHP_EOL;

print('Completed in ' . (int)(microtime(true) - $start_time) . ' seconds.' . PHP_EOL);
