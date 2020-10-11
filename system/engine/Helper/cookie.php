<?php


namespace Engine\Helper;


class Cookie
{
  /**
   * Добавляем кукис
   * @param     $key
   * @param     $value
   * @param int $time
   */
  public static function set($key, $value, $time = 31536000){
    setcookie($key, $value, time() + $time, '/' );
  }

  /**
   * Получить кукис по ключу
   * @param $key
   * @return mixed|null
   */
  public static function get($key){
    return (isset($_COOKIE[$key]))? $_COOKIE[$key]: null;
  }

  /**
   * Удаляем кукис
   * @param $key
   */
  public static function delete($key){
    if(isset($_COOKIE[$key])){
      self::set($key,'', -3600);
      unset($_COOKIE[$key]);
    }
  }
}