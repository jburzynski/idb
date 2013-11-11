<?php

namespace Service;

use Service\DBManager;

/**
 * LoginManager
 *
 * @author jburzynski
 */
class LoginManager
{
    protected $userManager;
    /* @var $userManager \Service\UserManager */
    
    public function __construct($userManager)
    {
        $this->userManager = $userManager;
    }
    
    public function checkAccess(array $roles)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (isset($_SESSION['role'])) {
            foreach ($roles as $role) {
                if ($role === $_SESSION['role']) {
                    return true;
                }
            }
        }
        return false;
    }
    
    public function checkCredentials($login, $passHash)
    {
        $login = addslashes($login);
        $passHash = addslashes($passHash);
        $mysqli = DBManager::getMysqli();
        /* @var $mysqli \mysqli */
        $result = $mysqli->query("SELECT login, password FROM user WHERE login='$login' AND password='$passHash'");
        if ($result->num_rows) {
            return true;
        }
        return false;
    }
    
    public function getLogin()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (isset($_SESSION['login'])) {
            return $_SESSION['login'];
        }
        return null;
    }
    
    public function getRole()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (isset($_SESSION['role'])) {
            return $_SESSION['role'];
        }
        return null;
    }
    
    public function signIn($login, $passHash)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $_SESSION['login'] = $login;
        $_SESSION['passHash'] = $passHash;
        $user = $this->userManager->getUserByLogin($login);
        $_SESSION['role'] = $user['role'];
    }
    
    public function signOut()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_destroy();
    }
}