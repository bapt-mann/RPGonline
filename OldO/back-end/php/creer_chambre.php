<?php
require 'config.php'; // Connexion à la base

if (!isset($_POST['player1'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Player1 is missing.'
    ]);
    exit;
}

$pseudoP1 = trim(htmlspecialchars($_POST['player1'], ENT_QUOTES, 'UTF-8'));

// Créer joueur
$sql = "INSERT INTO players (pseudo) VALUES (:pseudoP1)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'pseudoP1' => $pseudoP1
]);
$player1_id = $pdo->lastInsertId();

// Créer une nouvelle chambre
$sql = "INSERT INTO rooms (state, player1_id) VALUES ('waiting', player1_id)";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$room_id = $pdo->lastInsertId();

// Renvoyer l’ID de la chambre et joueur
echo json_encode(value: [
    'player1_id' => $player1_id,
    'room_id' => $room_id
]);
?>