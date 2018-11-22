<?php
declare(strict_types=1);

require_once "Parsedata.php";
require "../Model/RSSfeed.php";

/**
 * Class Sortinfo
 */
class Sortinfo extends Parsedata
{
    /**
     * @var
     */
    private $data;

    /**
     * @var
     */
    private $category;

    /**
     * @var
     */
    private $title;

    /**
     * @var
     */
    private $description;

    /**
     * @var
     */
    private $pubDate;

    /**
     * @var
     */
    private $link;

    /**
     * @var
     */
    public $connectInfo;

    /**
     * Sortinfo constructor.
     */
    public function __construct()
    {
        $this->connectInfo = include "../../web/database.php";
        $this->data = Parsedata::parsedata();
    }

    /**
     * @param $data
     * @return string
     */
    public function checkCategory( $data ): string
    {
        return !empty($data->category) ? (string)$data->category : $data->category = 'Default';
    }

    /**
     * @param $data
     * @return string
     */
    public function date($data): string
    {
        !empty($data->pubDate) ? $date = strtotime((string)$data->pubDate) : $date = strtotime("now");
        $format = date("Y-m-d h:i:s", $date);
        return $format;
    }

    /**
     *
     */
    public function sort(): void
    {
        $connection = new \RSSfeed($this->connectInfo);
        try {
            $i = 0;
            foreach ($this->data as $data) {
                $this->category = $this->checkCategory($data);
                $this->title = (string)$data->title;
                $this->description = (string)$data->description;
                $this->pubDate = $this->date($data);
                $this->link = (string)$data->link;

                if ($connection->checkTitleExist($this->title) === false) {
                    print_r(' --|'.$i++ . ' ' . $this->title . '|-- '); //checking how many articles were added, and which one
                    $connection->insertIntoDatabase($this->category, $this->title, $this->description, $this->pubDate, $this->link);
                }
            }
        } catch (\Exception $exception) {
            print_r($exception->getMessage());
        }
    }

    /**
     *
     */
    public static function check(): void
    {
        (new Sortinfo)->sort();
        print_r('Programa sekmingai atnaujino duomenis duomenų bazėje');
    }
}

Sortinfo::check();