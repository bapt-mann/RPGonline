<?php
namespace Core;
class Controller {
    protected $vars = array();
    // If "" => Shows the page without header nor footer
    // If "index" => Shows the page with header & footer from template page named "index".
    protected $layout = "index";

    protected function set($newValues): void
    {
        $this->vars = array_merge($this->vars, $newValues);
    }
    protected function render($viewPage): void
    {
        extract($this->vars);
        // Keep website update in cache
        ob_start();
        $controllerName = strtolower(get_class($this));
        $chemin = ROOT . "view/" . $controllerName . "/" . $viewPage . ".php";
        require $chemin;
        // Release the updated website in a variable to show it between header and footer in the template view
        $content_for_layout = ob_get_clean();
        if ($this->layout == false)
        {
            echo $content_for_layout;
        } else {
            require ROOT . "view/template/" . $this->layout . ".php";
        }
    }
    protected function redirect($filename): void
    {
        header("locaton: " . URL . $filename);
    }
}

?>