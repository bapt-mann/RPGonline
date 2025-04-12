<?php
use Core\Controller;

class Home extends Controller
{
    public function __construct() {}
    public function index($id = null): void
    {
        $this->render("index");
    }
}
?>