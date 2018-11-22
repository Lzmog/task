<?php

require 'SiteController.php';
require dirname(__DIR__) . '/Model/ListRSS.php';

/**
 * Class CurrentcatController
 */
class CurrentcatController extends SiteController
{
    /**
     * @return string
     */
    public static function currentcategory($link){
        $listFeed = new listRSS();
        $notFound = array("Page Not Found");
        return !empty($listFeed->selectSpecificCategory($link)) ? $listFeed->selectSpecificCategory($link) : $notFound;
    }
}