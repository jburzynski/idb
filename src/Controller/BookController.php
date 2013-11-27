<?php

namespace Controller;

use Service\LoginManager;
use Service\UserManager;
use Service\BookManager;

/**
 * profile controller
 *
 * @author wszubryt
 */
class BookController extends Controller
{
    public function indexAction($id)
    {
        $base = \Config::BASE_PATH;

        $userManager = new UserManager;
        $loginManager = new LoginManager($userManager);
        $bookManager = new BookManager();

        if (!$loginManager->checkAccess(array(UserManager::ROLE_ADMIN, UserManager::ROLE_USER))) {
            $this->redirect($base . '/index.php/login');
        }

        $login = $loginManager->getLogin();
		$book = $bookManager->getBook($id);
        $this->render('./view/book/index.php', array(
            'base' => $base,
			'login' => $login,
            'book' => $book
        ));
    }
	
}