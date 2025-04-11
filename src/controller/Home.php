<?php
use Core\Controller;

class Home extends Controller
{
    public function __construct() {}
    public function index($id = null): void
    {
        // Add custom stylesheet
        $variable["css"] = array(
            0 => "home"
        );
        $this->set($variable);
        $this->render("index");
    }
}
?>