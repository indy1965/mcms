<?php


namespace Engine\Core\Auth;


use Engine\Helper\Cookie;

class Auth implements InterfaceAuth
{
  /**
   * @return bool
   */
  public function is_authorized(){
    return $this->authorized;
  }

  public function hashUser(){
    return Cookie::get('auth_user');
  }

  public function authorization($hash_user){
    Cookie::set('auth_authorised', true);
    Cookie::set('auth_user', $hash_user);
  }

  /**
   *
   */
  public function unAuthorization(){
    Cookie::delete('auth_authorised');
    Cookie::delete( 'auth_user');
  }

  /**
   * геренируем случайное число для добавления к паролю
   * @return string
   */
  public function salt(){
    return (string) round(10000000, 99999999);
  }

  /**
   * хеширование пароля
   * @param        $pass
   * @param string $salt
   * @return string
   */
  public function encryptPassword($pass, $salt = ''){
    return hash('sha256', $pass . $salt);
  }
}