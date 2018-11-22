<?php
declare(strict_types=1);

/**
 * Class Argument
 */
class Argument
{

    /**
     * @return mixed
     */
    public static function takeArguments():array
    {
        global $argv;
        return $argv;
    }

}
