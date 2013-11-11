<?php

namespace Controller;

/**
 * login controller
 *
 * @author jburzynski
 */
class LoginController
{
    public function indexAction() {
        $filepath = './view/login/login.php';
        $content = file_get_contents($filepath);
        $base = \Config::BASE_PATH;
        eval($content);
    }
}