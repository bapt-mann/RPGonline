<?php
use Core\Controller;

class Lobby extends Controller
{
    public function __construct() {}
    public function create($id = null): void
    {
        $variable["css"] = array(
            0 => "lobby"
        );
        $this->set($variable);
        $this->render("create");
    }
    public function join($id = null): void
    {
        $variable["css"] = array(
            0 => "lobby"
        );
        $this->set($variable);
        $this->render("join");
    }
}
?>