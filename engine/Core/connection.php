<?php

namespace Engine\Core;

use \PDO;

class Connection
{
    private $link; // переменная для хранения соединения.

    /**
     * Connection constructor.
     */
    public  function __construct($host, $dbname, $charset, $username, $pass)
    {
        $this->connect($host, $dbname, $charset, $username, $pass);
    }

    /**
     * @return $this
     */
    private function connect($host, $dbname, $charset, $username, $pass){

        $dsn = sprintf("mysql:host:%s;dbname:%s;charset:%s", $host, $dbname, $charset);

        $this->link = new PDO($dsn, $username, $pass);

        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function execute($sql){
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    /**
     * @param $sql
     * @return array|TYPE_NAME
     */
    public function query($sql){
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        /** @var TYPE_NAME $result */
        return ($result === false)? [] : $result;
    }
}
