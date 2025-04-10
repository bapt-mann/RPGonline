<?php
$host = 'localhost';
$dbname = 'RPGOnline';
$user = 'root'; // Par défaut sous WAMP
$pass = ''; // Mot de passe vide sous WAMP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>