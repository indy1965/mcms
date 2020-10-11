<?php


namespace Engine\Core;


class Request
{
  /**
   * @return mixed
   */
  public static function get(){
    return $_GET;
  }

  /**
   * @return mixed
   */
  public static function post(){
    return $_POST;
  }

  /**
   * @return mixed
   */
  public static function request(){
    return $_REQUEST;
  }

  /**
   * @return mixed
   */
  public static function cookie(){
    return $_COOKIE;
  }

  /**
   * @return mixed
   */
  public static function files(){
    return $_FILES;
  }

  /**
   * @return mixed
   */
  public static function server(){
    return $_SERVER;
  }
}