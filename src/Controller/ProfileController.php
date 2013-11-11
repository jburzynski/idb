<?php

namespace Controller;

use Service\LoginManager;
use Service\UserManager;

/**
 * profile controller
 *
 * @author jburzynski
 */
class ProfileController extends Controller
{
    public function indexAction()
    {
        $base = \Config::BASE_PATH;
        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);
        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            $this->redirect($base . '/index.php/login');
            //throw new \Exception('Access denied');
        }
        $login = $loginManager->getLogin();
        $content = file_get_contents('./view/profile/index.php');
        eval($content);
    }
}