<?php

namespace Controller;

use Service\LoginManager;
use Service\UserManager;
use Service\CartManager;
use Service\ProfileManager;

/**
 * profile controller
 *
 * @author wszubryt
 */
class OrderController extends Controller
{
    public function indexAction()
    {
        $base = \Config::BASE_PATH;

        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);
        $cartManager = new CartManager();
		$profileManager = new ProfileManager();

        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            $this->redirect($base . '/index.php/login');
        }

		$cart = $cartManager->getCart();
		$login = $loginManager->getLogin();
		$user = $userManager->getUserByLogin($login);
		$addressList = $profileManager->getAddresses($user['id']);

        $this->render('./view/order/index.php', array(
            'base' => $base,
			'login' => $login,
			'cart' => $cart,
			'addressList' => $addressList,
            'action' => $base . '/index.php/order/order_new'
        ));
    }
	
	public function orderNewAction()
    {
        $base = \Config::BASE_PATH;

        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);
        $cartManager = new CartManager();
		$profileManager = new ProfileManager();

        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            $this->redirect($base . '/index.php/login');
        }

		$login = $loginManager->getLogin();
		$user = $userManager->getUserByLogin($login);
		$addressList = $profileManager->getAddresses($user['id']);
		
		if (isset($_POST['submit']))
		{
			$cart = $cartManager->getCart();
			$order = $profileManager->newOrder($_POST['select_address'], $user['id'], 1);
			if (isset($order)) {
                
				$result = true;
				
				$amount = 0;
				
				foreach ($cart as $book)
				{
					$result = $profileManager->newOrderBook($order['id'], $book['id'], 1);
					$amount += $book['price'];
				}
				
				$result = $profileManager->updateOrder($order['id'], $amount);
				
				if ($result)
				{
					$cartManager->clearCart();
					$this->redirect($base . '/index.php/profile');
				}
            }
		}

        $this->render('./view/order/index.php', array(
            'base' => $base,
			'login' => $login,
			'cart' => $cart,
			'addressList' => $addressList,
            'action' => $base . '/index.php/order/order_new'
        ));
    }
}