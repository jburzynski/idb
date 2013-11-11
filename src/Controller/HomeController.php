<?php

namespace Controller;

/**
 * HomeController
 *
 * @author jburzynski
 */
class HomeController extends Controller
{
    public function indexAction()
    {
        $content = file_get_contents('./view/home/index.php');
        $base = \Config::BASE_PATH;
        eval($content);
    }
}