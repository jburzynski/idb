<?php

/**
 * autoloader for the application
 *
 * @author jburzynski
 */

// \Namespace\To\Class => src/Namespace/To/Class.php
spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class);
    include 'src/' . $class . '.php';
});