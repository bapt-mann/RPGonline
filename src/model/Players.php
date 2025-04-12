<?php
use Core\Model;

class Players extends Model
{
    public function __construct()
    {
        $this->table = "players";
    }
}
?>