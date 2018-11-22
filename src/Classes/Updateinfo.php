<?php
declare(strict_types=1);

require_once "Parsedata.php";
require "../Model/RSSfeed.php";

/**
 * Class Updateinfo
 */
class Updateinfo extends Parsedata
{
    /**
     * @var
     */
    private $argv;

    /**
     * @var
     */
    private $link;

    /**
     * @var
     */
    private $category;

    /**
     * @var mixed
     */
    private $connectInfo;

    /**
     * Updateinfo constructor.
     */
    public function __construct()
    {
        $this->argv = Parsedata::updatedata();
        $this->connectInfo = include "../../web/database.php";
    }

    /**
     *
     */
    public function changeCategory(): void
    {
        $parameters = array_shift($this->argv);
        $this->link = $parameters['link'];
        $this->category = $parameters['category'];
        $connection = new \RSSfeed($this->connectInfo);

        if($connection->checkLinkExist($this->link) !== false){
            $connection->updateLinkCategory($this->category,$this->link);
        }
    }

    /**
     *
     */
    public static function updateInformation(): void
    {
        (new Updateinfo)->changeCategory();
    }
}

Updateinfo::updateInformation();