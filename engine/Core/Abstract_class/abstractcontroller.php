<?php


namespace Engine\Core\Abstract_class;

use Engine\DI;

abstract class AbstractController
{
  protected $di;
  protected $db;

  /**
   * AbstractController constructor.
   * @param DI $di
   */
  public function __construct( DI $di)
  {
    $this->di = $di;
  }
}