<?php

require dirname(__DIR__) . '/Library/sqldata.php';

/**
 * Class listRSS
 */
class ListRSS
{
    /**
     * @var
     */
    public $parameters;

    /**
     * ListRSS constructor.
     * @param array $data
     */
    public function __construct()
    {
        $this->parameters = new sqldata();
    }

    /**
     * @return mixed|string
     */
    public function selectAllCategories()
    {
        try {
            $connect = $this->parameters->PDOConnect();
            $sql = $connect->prepare("SELECT DISTINCT category FROM nfq_data");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @return array|string
     */
    public function selectSpecificCategory($category)
    {
        try {
            $connect = $this->parameters->PDOConnect();
            $sql = $connect->prepare("SELECT DISTINCT * FROM nfq_data WHERE category=:category");
            $sql->execute(array(':category' => $category));
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @return array|string
     */
    public function selectMostRecent()
    {
        try {
            $connect = $this->parameters->PDOConnect();
            $sql = $connect->prepare("SELECT DISTINCT * FROM nfq_data LIMIT 3;");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}