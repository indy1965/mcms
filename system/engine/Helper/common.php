<?php


namespace Engine\Helper;


class Common
{
  /**
   * @return bool
   */
  static public function isPost(){
    return ($_SERVER['REQUEST_METHOD'] === 'POST')? true: false;
  }

  /**
   * @return mixed
   */
  static public function getMethod(){
    return $_SERVER['REQUEST_METHOD'];
  }

  /**
   * @return false|mixed|string
   */
  static public function getPathUri(){
    $pathUri = $_SERVER['REQUEST_URI'];
    if($position = strpos($pathUri, '?')){
      $pathUri = substr($pathUri, 0 , $position);
    }

    return $pathUri;
  }

  static public function getHostUri(){
    return  ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
  }
}