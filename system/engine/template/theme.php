<?php


namespace Engine\Template;


class Theme
{
  public $url = '';

  protected $data = [];

  /**
   * @param string $postfix
   */
  public function header($postfix = null)
  {
    $this->setTemplateFileName('header',(string)$postfix);
  }

  /**
   * @param string $postfix
   */
  public function footer($postfix = null){
    $this->setTemplateFileName('footer', (string) $postfix);
  }

  /**
   * @param string $postfix
   */
  public function sidebar($postfix = null){
    $this->setTemplateFileName('sidebar', (string) $postfix);
  }

  /**
   * @param       $name
   * @param array $data
   * @throws \Exception
   */
  public function block( $name, $data = [])
  {
    $name = (string) $name;
    if($name !== ''){
      $this->loadTemplateFile($name, $data);
    }
  }

  /**
   * @param $templateFile
   * @param $postfix
   * @throws \Exception
   */
  private function setTemplateFileName($templateFile, $postfix)
  {
    if($postfix !== ''){
      $filename =  sprintf('%s-%s', $templateFile,  $postfix);
    }
    else{
      $filename = $templateFile;
    }

    $this->loadTemplateFile($filename);
  }

  /**
   * @param       $nameFile
   * @param array $data
   * @throws \Exception
   */
  private function loadTemplateFile($nameFile, $data = [])
  {
    $templateFile = THEME_DIR . '/default/' . $nameFile . '.php';

    if(is_file($templateFile)){

      extract($data);
      require_once $templateFile ;
    }
    else{
      throw new \Exception(sprintf('View "%s" not found', $templateFile));
    }
  }

  /**
   * @return array
   */
  public function getData(): array
  {
    return $this->data;
  }

  /**
   * @param array $data
   */
  public function setData(array $data): void
  {
    $this->data = $data;
  }
}