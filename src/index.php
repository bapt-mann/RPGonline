<?php
require "../vendor/autoload.php";
if(isset($_GET["p"]) && $_GET["p"] != ""){
    $params = explode("/", $_GET["p"]);
    $controller = ucfirst(strtolower($params[0]));
    $action = isset($params[1]) && $params[1] != "" ? $params[1] : "index";
    $param = isset($params[2]) && $params[2] != "" ? $params[2] : null;
} else {
    // Envoie dans l'accueil par défaut
    $controller = "home";
    $action = "index";
    $param = null;
}

if(!isset($_SESSION)){
    session_start();
}

// WEBROOT = RPGonline/src/
define("WEBROOT", str_replace("index.php", "", $_SERVER["SCRIPT_NAME"])); 
// ROOT = C://wamp64/www/RPGonline/src/
define("ROOT", str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));
// URL = RPGonline/
define("URL", str_replace("src/index.php", "", $_SERVER["SCRIPT_NAME"]));

if (file_exists(ROOT."controller/$controller.php"))
{
    require_once ROOT."controller/$controller.php";
    $controllerClass = new $controller();
    if (method_exists($controllerClass, $action))
    {
        $controllerClass->$action($param);
    }
}
?>