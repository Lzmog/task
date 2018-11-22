<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'web/routes.php';

/**
 * @param $class_name
 */
function __autoload($class_name)
{
    if (file_exists('src/Classes/' . $class_name . '.php')) {
        require_once 'src/Classes/' . $class_name . '.php';
    } else if (file_exists('src/Controller/' . $class_name . '.php')) {
        require_once 'src/Controller/' . $class_name . '.php';
    }
}
