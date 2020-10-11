<?php


namespace Admin\Controller;


use Engine\Core\Auth\Auth;
use Engine\Core\Classes\AbstractController;
use Engine\Core\Database\QueryBuilder;
use Engine\Core\Request;

class LoginController extends AbstractController
{
  protected $auth;

  public function __construct($di)
  {
    parent::__construct($di);

    $this->auth = new Auth();

    if($this->auth->hashUser() !== null){
      header('Location: /admin/');
      exit();
    }
  }

  public function form(){
    $this->view->render('login');
  }


  public function adminAuth(){
    $params = Request::post();

    $queryBuilder = new QueryBuilder();

    $sql = $queryBuilder
      ->select()
      ->from('user')
      ->where('email', $params['email'])
      ->where('password', md5($params['password']))
      ->limit(1)
      ->sql();

    $query = $this->db->query($sql, $queryBuilder->values);

    $queryBuilder->reset();

    if(!empty($query)){
      $user = $query[0];

      if($user['user_role'] === 'admin'){
        $hash = md5($user['id'] . $user['email'] . $user['password'] . $this->auth->salt());

        $sql = $queryBuilder
          ->update('user')
          ->set(['hash' => $hash])
          ->where('id', $user['id'])
          ->sql();

        $query = $this->db->execute($sql, $queryBuilder->values);

        $this->auth->authorization($hash);

        header('Location: /admin/login/');
        exit();
      }
    }
  }
}
