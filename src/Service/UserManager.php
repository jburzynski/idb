<?php

namespace Service;

use Service\DBManager;

/**
 * UserManager
 *
 * @author jburzynski
 */
class UserManager
{
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    
    public static function encryptPassword($passPlain)
    {
        return hash('sha512', $passPlain);
    }
    
    public function getUserByLogin($login)
    {
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        $result = $mysqli->query("SELECT u.login, u.password, ut.name AS role FROM user u LEFT JOIN user_type ut ON ut.id = u.user_type_id WHERE u.login='$login'");
        $row = $result->fetch_assoc();
        return $row;
    }
}