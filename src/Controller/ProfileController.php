<?php

namespace Controller;

use Service\LoginManager;
use Service\UserManager;
use Service\ProfileManager;

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
        $profileManager = new ProfileManager();

        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            $this->redirect($base . '/index.php/login');
        }

        $login = $loginManager->getLogin();
        $currentUser = $userManager->getUserByLogin($login);

        $orders = $profileManager->getOrders($currentUser['id']);
        $addresses = $profileManager->getAddresses($currentUser['id']);
        $this->render('./view/profile/index.php', array(
            'base' => $base,
            'login' => $login,
            'orders' => $orders,
            'addresses' => $addresses
        ));
    }

    public function orderDeleteAction($id)
    {
        $base = \Config::BASE_PATH;

        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);
        $profileManager = new ProfileManager();
        $user = $userManager->getUserByLogin($loginManager->getLogin());

        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            if (!($order = $profileManager->getOrder($id)) || $order['user_id'] !== $user['id']) {
                $this->redirect($base . '/index.php/profile');
            }
        }
        
        $profileManager->deleteOrder($id);

        $this->redirect($base . '/index.php/profile');
    }
}