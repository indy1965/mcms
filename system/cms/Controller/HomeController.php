<?php


namespace Cms\Controller;

class HomeController extends CmsController
{
  /**
   *
   */
  public function index(){
    $data = ['name' => 'Igor'];
    $this->view->render('index', $data);
  }

  /**
   * @param $id
   */
  public function news($id){
    echo $id;
  }
}
