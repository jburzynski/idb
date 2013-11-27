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

    public function addressNewAction()
    {
        $base = \Config::BASE_PATH;

        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);
        $profileManager = new ProfileManager();

        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            $this->redirect($base . '/index.php/profile');
        }

        $address = array(
            'street' => '',
            'street_number' => '',
            'city' => '',
            'postal_code' => ''
        );

        if (isset($_POST['address'])) {
            $address = $_POST['address'];
            $user = $userManager->getUserByLogin($loginManager->getLogin());
            if ($profileManager->newAddress($address, $user['id'])) {
                $this->redirect($base . '/index.php/profile');
            }
        }

        $this->render('./view/profile/address_form.php', array(
            'base' => $base,
            'action' => $base . '/index.php/profile/address_new',
            'address' => $address
        ));
    }

    public function addressEditAction($id)
    {
        $base = \Config::BASE_PATH;

        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);
        $profileManager = new ProfileManager();

        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            $this->redirect($base . '/index.php/profile');
        }

        $address = $profileManager->getAddress($id);

        if (isset($_POST['address'])) {
            $address['street'] = $_POST['address']['street'];
            $address['street_number'] = $_POST['address']['street_number'];
            $address['city'] = $_POST['address']['city'];
            $address['postal_code'] = $_POST['address']['postal_code'];

            if ($profileManager->editAddress($address)) {
                $this->redirect($base . '/index.php/profile');
            }
        }

        $this->render('./view/profile/address_form.php', array(
            'base' => $base,
            'action' => $base . "/index.php/profile/{$address['id']}/address_edit",
            'address' => $address
        ));
    }

    public function addressDeleteAction($id)
    {
        $base = \Config::BASE_PATH;

        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);
        $profileManager = new ProfileManager();
        $user = $userManager->getUserByLogin($loginManager->getLogin());

        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            if (!($address = $profileManager->getAddress($id)) || $address['user_id'] !== $user['id']) {
                $this->redirect($base . '/index.php/profile');
            }
        }

        $profileManager->deleteAddress($id);

        $this->redirect($base . '/index.php/profile');
    }
}