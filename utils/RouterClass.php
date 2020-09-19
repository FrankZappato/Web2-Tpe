<?php

class Route {
    private $url;
    private $verb;
    private $controller;
    private $method;
    private $params;

    public function __construct($url, $verb, $controller, $method){
        $this->url = $url;
        $this->verb = $verb;
        $this->controller = $controller;
        $this->method = $method;
        $this->params = [];
    }
    public function match($url, $verb) {
        if($this->verb != $verb){
            return false;
        }
        $partsURL = explode("/", trim($url,'/'));
        $partsRoute = explode("/", trim($this->url,'/'));

        if(count($partsRoute) != count($partsURL)){
            return false;
        }
        foreach ($partsRoute as $key => $part) {
            if($part[0] != ":"){
                if($part != $partsURL[$key])
                return false;
            } //es un parametro
            else
            $this->params[$part] = $partsURL[$key];
        }
        return true;
    }
    public function run($params){
        $controller = $this->controller;  
        $method = $this->method;
        $this->params = $params;
        var_dump($params);
        (new $controller())->$method($params);
    }
}

class Router {
    private $routeTable = [];
    private $defaultRoute;

    public function __construct() {
        $this->defaultRoute = null;
    }

    public function route($url, $verb) {
        $params = explode('/', $url);
        foreach ($this->routeTable as $route) {
            if($route->match($params[0], $verb)){
                // pasarle los parametros
                $route->run($params);
                return;
            }
        }
        if ($this->defaultRoute != null)
            $this->defaultRoute->run();
    }
    
    public function addRoute ($url, $verb, $controller, $method) {
        $this->routeTable[] = new Route($url, $verb, $controller, $method);
    }

    public function setDefaultRoute($controller, $method) {
        $this->defaultRoute = new Route("", "", $controller, $method);
    }
}
