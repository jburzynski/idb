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
    public function getOrder($id)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        $result = $mysqli->query("SELECT * FROM `order` WHERE id=" . $id);

        if (!$result) {
            return null;
        }

        return $result->fetch_assoc();
    }

    public function getOrders($userId)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        $result = $mysqli->query("SELECT * FROM `order` WHERE user_id=" . $userId);

        if (!$result) {
            return null;
        }

        $resultsArray = array();
        while ($row = $result->fetch_assoc()) {
            $booksResult = $mysqli->query("SELECT b.title, b.author, b.price, ob.amount FROM book b"
                    . " LEFT JOIN"
                    . " order_book ob ON ob.book_id = b.id"
                    . " LEFT JOIN"
                    . " `order` o ON ob.order_id = o.id"
                    . " WHERE o.id = {$row['id']}");
            if ($booksResult) {
                $row['books'] = array();
                while ($bookRow = $booksResult->fetch_assoc()) {
                    $row['books'][] = $bookRow;
                }
            }
            $resultsArray[] = $row;

        }
        return $resultsArray;
    }

    public function getAddresses($userId)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        $result = $mysqli->query("SELECT * FROM address WHERE user_id=" . $userId);

        if (!$result) {
            return null;
        }

        $resultsArray = array();
        while ($row = $result->fetch_assoc()) {
            $resultsArray[] = $row;
        }
        return $resultsArray;
    }

    public function deleteOrder($id)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        
        $stmt = $mysqli->prepare("DELETE FROM order_book WHERE order_id=".$id);
        $stmt->execute();
        $stmt->close();

        $stmt = $mysqli->prepare("DELETE FROM `order` WHERE id=".$id);
        $stmt->execute();
        $stmt->close();
    }
}