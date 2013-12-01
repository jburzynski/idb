<?php

namespace Service;

use Service\DBManager;

/**
 * ProfileManager
 *
 * @author wszubryt
 */
class BookManager
{
    public function getBook($id)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        $result = $mysqli->query("SELECT * FROM book WHERE id=". $id);

        if (!$result) {
            return null;
        }

        return $result->fetch_assoc();
    }

	public function addToCart($book)
	{
		if (!isset($_SESSION['cart']))
		{
			$_SESSION['cart']=array();
		}
		
		array_push($_SESSION['cart'], $book);
	}
}