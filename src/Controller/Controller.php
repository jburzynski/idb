<?php

namespace Controller;

/**
 * Controller
 *
 * @author jburzynski
 */
class Controller
{
    protected function redirect($url)
    {
        header("Location: $url");
    }
}