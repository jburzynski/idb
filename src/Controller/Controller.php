<?php

namespace Controller;

/**
 * Controller
 *
 * @author jburzynski
 */
abstract class Controller
{
    protected function redirect($url)
    {
        header("Location: $url");
    }
    
    protected function render($path, array $vars = null)
    {
        $template = file_get_contents($path);
        if ($vars) {
            extract($vars);
        }
        eval($template);
    }
}