<?php

/**
 * entry point for the application
 *
 * @author jburzynski
 */

require 'autoload.php';
require 'config.php';

$kernel = new \Kernel;
$kernel->render();