<?php


namespace Engine\Core\Classes;

use Engine\DI;

abstract class AbstractService
{
    protected $di;

    /**
     * AbstractService constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
    }

    abstract function init();
}
