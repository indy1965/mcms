<?php

namespace Engine\Template ;

use Engine\Template\Theme;
/**
 *
 */
class View
{
  protected $theme;

  public function __construct(){
    $this->theme = new Theme();
  }

  /**
   * @param       $template
   * @param array $vars
   * @throws \Exception
   */
  public function render($template, $vars = []){

    $templateFile = THEME_DIR . '/default/' . $template . '.php';

    if(!is_file($templateFile)){
      throw new \InvalidArgumentException(sprintf('Template "%s" not found',$templateFile));
    }

    $this->theme->setData($vars);
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
