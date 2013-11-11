<?php

namespace Service;

use Config;

/**
 * DBManager
 *
 * @author jburzynski
 */
class DBManager
{
    public static function getMysqli()
    {
        $mysqli = new \mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD, Config::DB_DATABASE);
        if ($mysqli->connect_errno) {
            throw new \Exception("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
        }
        return $mysqli;
    }
}