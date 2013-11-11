<?php

/**
 * application's router class
 *
 * @author jburzynski
 */
class Router
{
    
//    public function getPatterns() {
//        return array(
//            '/:controller',
//            '/:controller/:action',
//            '/:controller/:id/:action'
//        );
//    }
    
    const DEFAULT_CONTROLLER = 'Home';
    
    protected $segments;
    
    public function __construct()
    {
        $uri = str_replace(Config::BASE_PATH, '', $_SERVER['REQUEST_URI']);
        $this->segments = explode('/', $uri);
    }
    
    public function invokeAction()
    {
        if (isset($this->segments[2])) {
            if (!isset($this->segments[3])) {
                $controller = $this->segments[2];
                $action = 'index';
            } else if (!isset($this->segments[4])) {
                $controller = $this->segments[2];
                $action = $this->segments[3];
            } else {
                $controller = $this->segments[2];
                $action = $this->segments[4];
                $param = $this->segments[3];
            }
        } else {
            $controller = self::DEFAULT_CONTROLLER;
            $action = 'index';
        }
        
        if (!$controller || !$action) {
            throw new MalformedUrlException('Requested URL is not valid.');
        }
        
        $controller = ucfirst(strtolower($controller)) . 'Controller';
        $controller = '\Controller\\' . $controller;
        $action = $action . 'Action';
        
        $instance = new $controller;
        if (isset($param)) {
            $instance->$action($param);
        } else {
            $instance->$action();
        }
    }
}