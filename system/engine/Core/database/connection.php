<?php

namespace Engine\Core\Database;

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
   * @throws \Exception
   */
    private function connect($host, $dbname, $charset, $username, $pass){

        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', $host, $dbname, $charset);
      try {
        $this->link = new PDO($dsn, $username, $pass);
      }catch (PDOException $e) {
        throw new \Exception('$e->getMessage()');
      }
        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function execute($sql, $values = []){
        $sth = $this->link->prepare($sql);
        return $sth->execute($values);
    }

  /**
   * @param $sql
   * @return array|TYPE_NAME
   * @throws \Exception
   */
    public function query($sql, $values = []){
      try {
        $sth = $this->link->prepare($sql);
        $sth->execute($values);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        /** @var TYPE_NAME $result */
        return ($result === false) ? [] : $result;
      }catch (PDOException $e) {
        throw new \Exception('$e->getMessage()');
      }
    }
}
