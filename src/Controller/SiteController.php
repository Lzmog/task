<?php

/**
 * Class Controller
 * @package Controller
 */
class SiteController
{
    /**
     * @param $viewName
     * @param $values
     */
    public static function CreateView($values, $viewName) {
        $data = $values;
        include dirname(__DIR__) . "../../views/pages/$viewName.php";
    }
}
