<?php


namespace Engine;

use Engine\Core\Router\DispatchedRoute;
use Engine\Helper\Common;

class Cms
{
    private $di;
    private $router;

    /**
     * Cms constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $di->get('router');
    }

  /**
   *
   */
    public function run(){
      try{
        // Подключаем роуты
        require_once(ENV_DIR . '/Route.php');

        $routeDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUri());

        if($routeDispatch === null){
          $routeDispatch = new DispatchedRoute('ErrorController:page404');
        }

        list($class, $action)  = explode(':', $routeDispatch->getController(), 2);

        $controller = '\\' . ENV . '\\Controller\\' . $class;

        $parameters = $routeDispatch->getParameters();
        call_user_func_array([new $controller($this->di), $action], $parameters);
      }
      catch(\ErrorException $err){
        echo $err->getMessage();
        exit;
      }
    }
}
