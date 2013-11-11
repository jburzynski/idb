<?php

namespace Controller;

use Service\UserManager;
use Service\LoginManager;

/**
 * login controller
 *
 * @author jburzynski
 */
class LoginController extends Controller
{
    public function indexAction()
    {
        $base = \Config::BASE_PATH;
        if (isset($_POST['login'])) {
            $userManager = new UserManager;
            $loginManager = new LoginManager($userManager);
            $login = $_POST['login'];
            $passHash = UserManager::encryptPassword($_POST['password']);
            if ($loginManager->checkCredentials($login, $passHash)) {
                $loginManager->signIn($login, $passHash);
                $this->redirect($base . '/index.php/profile');
            }
            $message = 'Nieprawidłowy login lub hasło.';
        }
        $content = file_get_contents('./view/login/index.php');
        eval($content);
    }
    
    public function logoutAction()
    {
        $base = \Config::BASE_PATH;
        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);
        if ($loginManager->getLogin()) {
            $loginManager->signOut();
        }
        $this->redirect($base . '/index.php/login');
    }
}