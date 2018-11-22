<?php
declare(strict_types=1);

require "../Library/sqldata.php";

/**
 * Class RSSfeed
 */
class RSSfeed
{

    /**
     * @var
     */
    private $parameters;

    /**
     * @var
     */
    private $connection;

    /**
     * RSSfeed constructor.
     * @param array $data
     */
    public function __construct()
    {
        $this->parameters = new sqldata;
        $this->connection = $this->parameters->PDOConnect();
    }

    /**
     * @param string $category
     * @param string $title
     * @param string $description
     * @param string $pubDate
     * @param string $link
     * @return string
     */
    public function insertIntoDatabase(string $category, string $title, string $description, string $pubDate, string $link)
    {
        try {
            $sql = $this->connection->prepare("INSERT INTO nfq_data (category,title,description,pubDate,link) VALUES ('" . $category . "', '" . $title . "', '" . $description . "', '" . $pubDate . "', '" . $link . "')");
            $sql->execute();
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @return mixed|string
     */
    public function checkTableExist()
    {
        try {
            $this->connection->query("SELECT 1 FROM nfq_data LIMIT 1");
        } catch (Exception $exception) {
            $this->createTable();
            print_r('Table was created');
        }
    }

    /**
     * @return mixed|string
     */
    public function createTable()
    {
        try {
            $check = $this->connection->prepare("CREATE TABLE nfq_data (
                log_id int auto_increment not null,
                category VARCHAR(255),
                title VARCHAR(255),
                description VARCHAR(255),
                pubDate DATE,
                link VARCHAR(255),
                PRIMARY KEY(log_id));
            ");
            $check->execute();
            return $check->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @param string $information
     * @return mixed|string
     */
    public function checkTitleExist(string $information)
    {
        try {
            $check = $this->connection->prepare("SELECT title FROM nfq_data WHERE title=:title");
            $check->execute(array(':title' => $information));
            return $check->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @param string $information
     * @return mixed|string
     */
    public function checkLinkExist(string $information)
    {
        try {
            $check = $this->connection->prepare("SELECT link FROM nfq_data WHERE link=:link");
            $check->execute(array(':link' => $information));
            return $check->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function updateLinkCategory(string $category, string $link)
    {
        try {
            $update = $this->connection->prepare("UPDATE nfq_data SET category = :category WHERE link = :link");
            $update->execute(array(':category' => $category, ':link' => $link));
            echo $update->rowCount() . " records UPDATED successfully";
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}