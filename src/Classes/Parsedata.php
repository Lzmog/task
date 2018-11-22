<?php
declare(strict_types=1);

require_once "Argument.php";

/**
 * Class Parsedata
 */
class Parsedata extends Argument
{

    /**
     * @var
     */
    private $argv;

    /**
     * Parsedata constructor.
     */
    public function __construct()
    {
        $this->argv = parent::takeArguments();
    }

    /**
     * @param $firstScript
     * @return mixed
     */
    public function NotEmpty( bool $firstScript )
    {
        if ($firstScript) {
            $parameter = (!empty($this->argv[1]) && (strpos($this->argv[1], "https://") !== false)) ? $this->argv[1] : exit('Missing URL parameter. Url must be with https://');
        } else {
            return (!empty($this->argv[1]) && (strpos($this->argv[1], "https://") !== false) && !empty($this->argv[2])) ? $parameter = array(['link' => $this->argv[1], 'category' => $this->argv[2]]) : exit('Missing URL or category parameter. Url must be with https://');
        }

        return $parameter;
    }

    /**
     * @return array
     */
    public static function parsedata(): array
    {
        $firstScript = true;
        $link = (new Parsedata)->NotEmpty($firstScript);
        $entries = array();

        mb_convert_encoding($link, 'HTML-ENTITIES', "UTF-8");

        if (strpos(get_headers($link)[3],'xml') !== false) {
            $xml = simplexml_load_file($link);
        } else {
            exit('Expected for XML RSS FEED URL, text/html URL given');
        }

        $entries = array_merge($entries, $xml->xpath("//item"));
        return $entries;
    }

    /**
     * @return mixed
     */
    public static function updatedata()
    {
        $firstScript = false;
        $parameters = (new Parsedata)->NotEmpty($firstScript);
        return $parameters;
    }
}

