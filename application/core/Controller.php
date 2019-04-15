<?php

namespace application\core;

abstract class Controller
{

    protected $route;
    protected $view;
    protected $acl;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
    }
    protected static function param(string $name){
        return $_REQUEST[$name];
    }

}