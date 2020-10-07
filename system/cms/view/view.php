<?php

namespace Cms\View;
/**
 *
 */
class View{
  public function __construct(){

  }

  /**
   *
   */
  public function render($template, $vars = []){

    $templateFile = WUO_ROOT . '/content/themes/default/' . $template . '.php';

    if(!is_file($templateFile)){
      throw new \InvalidArgumentException(sprintf('Template "%s" not found',$templateFile));
    }

    extract($vars);

    ob_start(); // Включаем буферизацию.
    ob_implicit_flush(0); // Отключаем очистку.

    try{

      require $templateFile;

    }catch (\Exception $e){
      ob_end_clean(); // Очищаем буфер
      throw $e;
    }

    echo ob_get_clean(); // выводим содержибое буфера и очищаем буфер.
  }
}
