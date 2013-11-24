<?php

namespace Service;

use Service\DBManager;

/**
 * ProfileManager
 *
 * @author jburzynski
 */
class ProfileManager
{
    public function getOrders($userId)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        $result = $mysqli->query("SELECT * FROM order WHERE user_id=" . $userId);
        $resultsArray = array();
        while ($row = $result->fetch_assoc()) {
            $resultsArray[] = $row;
        }
        return $resultsArray;
    }

    public function getAddresses($userId)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        $result = $mysqli->query("SELECT * FROM address WHERE user_id=" . $userId);
        $resultsArray = array();
        while ($row = $result->fetch_assoc()) {
            $resultsArray[] = $row;
        }
        return $resultsArray;
    }
}