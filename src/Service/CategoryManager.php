<?php

namespace Service;

use Service\DBManager;

/**
 * CategoryManager
 *
 * @author wszubryt
 */
class CategoryManager
{    
    public function getCategories()
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        $result = $mysqli->query("SELECT * FROM category");
		$results_array = array();
		while($row = $result->fetch_assoc())
		{
			$results_array[] = $row;
		}
        return $results_array;
    }
}