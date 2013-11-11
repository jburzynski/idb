<?php

/**
 * main Kernel class for the application
 *
 * @author jburzynski
 */
class Kernel
{
    public function render() {
        $router = new \Router;
        try {
            $router->invokeAction();
        } catch(Exception $e) {
            print('Exception of type <strong>' . get_class($e) . '</strong> thrown:<br />');
            print('<em>' . $e->getMessage() . '</em>');
        }
    }
}