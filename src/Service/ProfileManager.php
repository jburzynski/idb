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

    public function newAddress(array $address, $userId)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */

        $state = 'active';
        $stmt = $mysqli->prepare("INSERT INTO"
                . " address(state, street, street_number, city, postal_code, user_id)"
                . " VALUES"
                . " (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssissi', $state, $address['street'], $address['street_number'], $address['city'], $address['postal_code'], $userId);
        $stmt->execute();
        $stmt->close();

        return true;
    }

    public function editAddress(array $address)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */

        $stmt = $mysqli->prepare("UPDATE address SET street='{$address['street']}', street_number={$address['street_number']}, city='{$address['city']}', postal_code='{$address['postal_code']}' WHERE id={$address['id']}");
        $stmt->execute();
        $stmt->close();

        return true;
    }

    public function getAddress($id)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        $result = $mysqli->query("SELECT * FROM address WHERE id=" . $id);

        if (!$result) {
            return null;
        }

        return $result->fetch_assoc();
    }

    public function deleteAddress($id)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */

        $stmt = $mysqli->prepare("DELETE FROM `order` WHERE address_id=".$id);
        $stmt->execute();
        $stmt->close();

        $stmt = $mysqli->prepare("DELETE FROM address WHERE id=".$id);
        $stmt->execute();
        $stmt->close();
    }
}