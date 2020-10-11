<?php


namespace Engine\service;

use Engine\Core\router\Router;
use Engine\Core\Classes\AbstractService;
use Engine\Helper\Common;

class RouterService extends  AbstractService
{
  private $serviceName = 'router';

  /**
   *
   */
  public function init()
  {
    $router = new Router(Common::getHostUri());
    $this->di->set($this->serviceName,$router);
  }
}
