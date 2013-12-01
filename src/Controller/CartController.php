<?php

namespace Controller;

use Service\LoginManager;
use Service\UserManager;
use Service\BookManager;
use Service\CartManager;

/**
 * profile controller
 *
 * @author wszubryt
 */
class CartController extends Controller
{	
	public function indexAction()
    {
        $base = \Config::BASE_PATH;

        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);		
		$cartManager = new CartManager();

        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            $this->redirect($base . '/index.php/login');
        }

        $login = $loginManager->getLogin();
		$cart = $cartManager->getCart();
        $this->render('./view/cart/index.php', array(
            'base' => $base,
			'login' => $login,
			'cart' => $cart
        ));
    }
	
	public function addToCartAction($id)
    {
        $base = \Config::BASE_PATH;

        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);
        $bookManager = new BookManager();
		$cartManager = new CartManager();

        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            $this->redirect($base . '/index.php/login');
        }

        $login = $loginManager->getLogin();
		$book = $bookManager->getBook($id);
		$cartManager->addToCart($book);
		$cart = $cartManager->getCart();
		
        $this->render('./view/cart/index.php', array(
            'base' => $base,
			'login' => $login,
			'cart' => $cart
        ));
    }
	
	public function deleteFromCartAction($id)
    {
        $base = \Config::BASE_PATH;

        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);
        $bookManager = new BookManager();
		$cartManager = new CartManager();

        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            $this->redirect($base . '/index.php/login');
        }

        $login = $loginManager->getLogin();
		$book = $bookManager->getBook($id);
		$cartManager->deleteFromCart($book);
		$cart = $cartManager->getCart();
		
        $this->render('./view/cart/index.php', array(
            'base' => $base,
			'login' => $login,
			'cart' => $cart
        ));
    }
	
}