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

    $templateFile = $this->getTemplatePath($template, ENV);

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

  private function getTemplatePath($template, $env = ''){

    switch ($env) {
      case 'Admin':
        return WUO_ROOT . '/admin/view/' . $template . '.php';

      case 'Cms':
        return WUO_ROOT . '/content/themes/default/' . $template . '.php';

      default:
        return WUO_ROOT . '/' . mb_strtolower($env) . '/view/' . $template . '.php';
        break;
    }
  }
}
