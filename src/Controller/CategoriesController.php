<?php

require 'SiteController.php';
require dirname(__DIR__) . '/Model/ListRSS.php';

/**
 * Class CategoriesController
 */
class CategoriesController extends SiteController
{
    /**
     * @return mixed|string
     */
    public static function listAll()
    {

        $listFeed = new listRSS();
        $category = $listFeed->selectAllCategories();
        $recent = $listFeed->selectMostRecent();
        $data= array($category,$recent);

        return $data;
    }
}
