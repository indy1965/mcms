<?php


namespace Admin\Controller;


use Engine\Core\Auth\Auth;
use Engine\Core\Classes\AbstractController;
use Engine\Core\Request;
use Engine\Helper\Common;

class AdminController extends AbstractController
{

  /**
   * @var Auth
   */
  protected $auth;

  /**
   * HomeController constructor.
   * @param $di
   */
  public function __construct($di)
  {
    parent::__construct($di);

   $this->auth = new Auth();

   if($this->auth->hashUser() === null){
     header('Location: /admin/login/');
     exit();
   }

  }

  private function checkAutorization()
  {
  }

  public function logout(){
    $this->auth->unAuthorization();
    header('Location: /admin/login/');
    exit();
  }
}