<?php

namespace Controller;

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
        $this->render('./view/categories/index.php', array(
            'base' => $base
        ));
    }
}