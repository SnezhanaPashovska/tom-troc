<?php

class View 
{
  private $template;
  private $params = [];

  public function __construct($template)
  {
    $this->template = $template;
  }

  public function render(string $viewName, array $params = []) : void 
  {
    $viewPath = $this->buildViewPath($viewName);
    //echo "View path: $viewPath";
    $content = $this->_renderViewFromTemplate($viewPath, $params);
    $template = $this->template;
    ob_start();
    require(MAIN_VIEW_PATH);
    echo ob_get_clean();
  }

  private function _renderViewFromTemplate(string $viewPath, array $params = []) : string 
  {
    if (file_exists($viewPath)) {
      extract($params);
      ob_start();
      require($viewPath);
      return ob_get_clean();
    } else {
      throw new Exception("La vue '$viewPath' est introuvable.");
    }
  }

  private function buildViewPath(string $viewName) : string 
  {
    return TEMPLATE_VIEW_PATH . $viewName . '.php';
  }
}
