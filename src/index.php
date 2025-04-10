<?php
require "../vendor/autoload.php";
// Envoie dans l'accueil par défaut
if(!isset($_GET["p"])){
    $controller = "Accueil";
    $action = "index";
    $param = null;
}

$params = explode("/", $_GET["p"]);
$controller = ucfirst(strtolower($params[0]));
$action = isset($params[1]) && $params[1] != "" ? $params[1] : "index";
$param = isset($params[2]) && $params[2] != "" ? $params[2] : null;

if(!isset($_SESSION)){
    session_start();
}

// WEBROOT = RPGonline/src/
define("WEBROOT", str_replace("index.php", "", $_SERVER["SCRIPT_NAME"])); 
// ROOT = C://wamp64/www/RPGonline/src/
define("ROOT", str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));
// URL = RPGonline/
define("URL", str_replace("src/index.php", "", $_SERVER["SCRIPT_NAME"]));


?>