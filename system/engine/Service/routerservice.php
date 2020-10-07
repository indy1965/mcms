<?php


namespace Engine\service;

use Engine\Core\Router\Router;
use Engine\Core\Classes\AbstractService;

class RouterService extends  AbstractService
{
  private $serviceName = 'router';

  /**
   *
   */
  public function init()
  {
    $router = new Router('http://mos/');
    $this->di->set($this->serviceName,$router);
  }
}
