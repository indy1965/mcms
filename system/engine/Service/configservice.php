<?php


namespace Engine\Service;


use Engine\Core\Classes\AbstractService;
use Engine\Core\Config;

class ConfigService extends  AbstractService
{
  private $serviceName = 'config';

  /**
   *
   */
  public function init()
  {
    $this->di->set($this->serviceName,new Config());
  }
}