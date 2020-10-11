<?php


namespace Engine\Service;

use Engine\Core\Database\Connection;
use Engine\Core\Classes\AbstractService;

class DBService extends  AbstractService
{
    private $serviceName = 'db';

    public function init()
    {
        $db = new Connection('localhost', 'm_cms', 'utf8','admin', '12345678');
        $this->di->set($this->serviceName,$db);
    }
}
