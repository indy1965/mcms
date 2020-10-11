<?php


namespace Engine\Core\router;

class UriDispatcher
{
  /**
   * @var array
   */
  private $method = [
    'GET',
    'POST'
  ];

  /**
   * @var array
   */
  private $routes = [
    'GET' => [],
    'POST' => [],
  ];

  /**
   * @var array
   */
  private $patterns = [
    'int' => '[0-9]+',
    'str' => '[a-zA-Z\.\-_%]+',
    'any' => '[a-zA-Z0-9\.\-_%]+',
  ];

  /**
   * @param $method
   * @return array|mixed
   */
  private function routes($method){
    return isset($this->routes[$method])? $this->routes[$method] : [];
  }

  /**
   * @param $method
   * @param $uri
   * @return DispatchedRoute
   */
  private function doDispatch($method, $uri){
    // Перебираем все роуты с мтодом $method
    foreach ($this->routes($method) as $route => $controller){
      $pattern = '#^' . $route . '$#s';

      if(preg_match($pattern, $uri, $parameters)){
        return new DispatchedRoute($controller, $this->processParameters($parameters));
      }
    }
  }

  /**
   * @param $pattern
   * @return string|string[]|null
   */
  private function convertPattern($pattern){

    if( strpos($pattern, '(') === false){
      return $pattern;
    }
    //Выполням поиск по регулярному выражению и замену с использованием callback-функции
    return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
  }

  /**
   * @param $matches
   * @return string
   */
  private function replacePattern($matches){
    return '(?<' . $matches[1] . '>' . strtr($matches[2], $this->patterns) . ')';
  }

  /**
   * @param $parameters
   * @return mixed
   */
  private function processParameters($parameters){

    foreach ($parameters as $key => $value){
      if(is_int($key)){
        unset($parameters[$key]);
      }
    }
    return $parameters;
  }

  /**
   * @param $method
   * @param $pattern
   * @param $controller
   */
  public function register($method, $pattern, $controller){

    $convert = $this->convertPattern($pattern);
    $this->routes[strtoupper($method)][$convert] = $controller;
  }

  /**
   * @param $key
   * @param $pattern
   */
  public function addPattern($key, $pattern){
    $this->paterns[$key] = $pattern;
  }

  /**
   * @param $method
   * @param $uri
   * @return DispatchedRoute
   */
  public function dispatch($method, $uri){
    $router = $this->routes(strtoupper($method));

    return (array_key_exists($uri, $router)) ? new DispatchedRoute($router[$uri]) : $this->doDispatch($method, $uri);
  }

}