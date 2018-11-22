<?php
declare(strict_types=1);


/**
 * Class sqldata
 */
class sqldata
{
    /**
     * @var PDO
     */
    private $dbConnection;

    /**
     * @var
     */
    private $data;

    /**
     * sqldata constructor.
     * @param array $data
     */
    public function __construct()
    {
        $this->data = include(dirname(__FILE__) . '/../../web/database.php');
        $this->dbConnection = $this->PDOConnect();
    }

    /**
     * @param $array
     * @return PDO
     */
    public function PDOConnect()
    {
        $parameters = $this->data;
        $pdo = new \PDO($parameters[0]['dns'], $parameters[0]['user'], $parameters[0]['pass'], $parameters[0]['opt']);
        return $pdo;
    }
}
