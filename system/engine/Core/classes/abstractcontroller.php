<?php


namespace Engine\Core\Classes;

use Engine\DI;

abstract class AbstractController
{
  protected $di;
  protected $db;
  protected $view;

  /**
   * AbstractController constructor.
   * @param DI $di
   */
  public function __construct( DI $di)
  {
    $this->di = $di;
    $this->view = $this->di->get('view');
  }
}
