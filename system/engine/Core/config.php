<?php


namespace Engine\Core;


class Config
{
  /**
   * @param        $key
   * @param string $group
   * @return mixed|null
   * @throws \Exception
   */
  public static function item($key, $group = 'main'){
    $groupItems = Config::file($group);
    return isset( $groupItems[$key])? $groupItems[$key] : null;
  }

  /**
   * @param $group
   * @return mixed
   * @throws \Exception
   */
  public static function file($group){

    $path = $_SERVER['DOCUMENT_ROOT'] . '/' . mb_strtolower(ENV) . '/config/' . $group .'.php';

    if(file_exists($path)){
      $items = require_once $path;

      if(is_array($items)){
        return $items;
      }
      else{
        throw new \Exception(
          sprintf('Config file <string>%s</string> is not a valid array.',$path)
        );
      }
    }
    else{
      throw new \Exception(
        sprintf('Cannot load config from file. File <string>%s</string> does not exist.',$path)
      );
    }

  }
}