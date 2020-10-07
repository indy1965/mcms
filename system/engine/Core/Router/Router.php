<?php

namespace Engine\Core\Router;

class Router
{
  private $routes = [];
  private $dispatcher;
  private $host;

    /**
     * Router constructor.
     * @param $host
     */
  public function __construct($host){
    $this->host = $host;
  }

  /**
   * ДОбавляем роут
   * @param $key
   * @param $pattern
   * @param $controller
   * @param string $method
   */
  public function add($key, $pattern, $controller, $method = 'GET'){
    $this->routes[$key] = [
      'pattern'      => $pattern,
      'controller'  => $controller,
      'method'      => $method
    ];
  }

  /**
   * @param $method
   * @param $uri
   * @return DispatchedRoute
   */
  public function dispatch($method, $uri){
    return $this->getDispatcher()->dispatch($method, $uri);
  }

  /**
   * @return UriDispatcher
   */
  public function getDispatcher() {
    if ($this->dispatcher == null){
      $this->dispatcher = new UriDispatcher();

      foreach ($this->routes as $route){
        $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
      }
    }
    return $this->dispatcher;
  }
}


