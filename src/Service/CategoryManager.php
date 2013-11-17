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
    public function getCategories($id)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        if ($id == NULL)
		{
			$result = $mysqli->query("SELECT * FROM category");
		}
		else
		{
			$result = $mysqli->query("SELECT * FROM category WHERE parent_id=" . $id);
		}
		$results_array = array();
		while($row = $result->fetch_assoc())
		{
			$results_array[] = $row;
		}
        return $results_array;
    }
	
	public function getBooks($categoryId)
	{
		$mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        $result = $mysqli->query("SELECT * FROM book WHERE category_id=" . $categoryId);
		$results_array = array();
		while($row = $result->fetch_assoc())
		{
			$results_array[] = $row;
		}
        return $results_array;
	}
}