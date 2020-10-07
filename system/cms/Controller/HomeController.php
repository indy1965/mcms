<?php


namespace Cms\Controller;

class HomeController extends CmsController
{
  /**
   *
   */
  public function index(){
    $this->di->get('view')->render('index');
  }

  /**
   * @param $id
   */
  public function news($id){
    echo $id;
  }
}
