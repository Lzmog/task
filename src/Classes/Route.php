<?php

/**
 * Class Route
 */
class Route
{
    /**
     * @var array
     */
    public static $validRoutes = array();

    /**
     * @param $route
     * @param $function
     */
    public static function set($route, $function)
    {
        $url = '';
        self::$validRoutes[] = $route;

        if (isset($_GET['url']) && is_string($_GET['url'])) {
            $url = $_GET['url'];
        }

        if ($url == $route) {
            $function->__invoke();
        }
    }
}