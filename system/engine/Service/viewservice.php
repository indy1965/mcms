<?php

namespace Engine\service;

use Engine\Core\Classes\AbstractService;
use Engine\Template\View;

class ViewService extends  AbstractService
{
  private $serviceName = 'view';

  /**
   *
   */
  public function init()
  {
    $this->di->set($this->serviceName,new View());
  }
}
