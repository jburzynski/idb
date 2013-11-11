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
        $content = file_get_contents('./view/categories/index.php');
        $base = \Config::BASE_PATH;
        eval($content);
    }
}