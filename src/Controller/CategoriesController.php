<?php

namespace Controller;

use Service\LoginManager;
use Service\UserManager;
use Service\CategoryManager;

/**
 * CategoriesController
 *
 * @author jburzynski
 */
class CategoriesController extends Controller
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
		
		$categoryManager = new CategoryManager();
		$categoryList = $categoryManager->getCategories();
		$this->render('./view/categories/index.php', array(
            'base' => $base,
			'categoryList' => $categoryList
        ));
    }
}