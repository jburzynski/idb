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
        $base = \Config::BASE_PATH;
        $this->render('./view/home/index.php', array(
            'base' => $base
        ));
    }
}