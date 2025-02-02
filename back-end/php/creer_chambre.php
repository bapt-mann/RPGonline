<?php
require 'config.php'; // Connexion à la base

if (!isset($_POST['player1'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Le champ joueur1 est manquant.'
    ]);
    exit;
}

$pseudoP1 = trim(htmlspecialchars($_POST['player1'], ENT_QUOTES, 'UTF-8'));



// Créer une nouvelle chambre
$sql = "INSERT INTO rooms (state, player1_id) VALUES ('en attente', :pseudoP1)";

$stmt = $pdo->prepare($sql);
$stmt->execute(params: [
    'pseudoP1' => $pseudoP1
]);
$room_id = $pdo->lastInsertId();

// Créer joueur
$sql = "INSERT INTO players (pseudo, room_id) VALUES (:pseudoP1, :room_id)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'pseudoP1' => $pseudoP1,
    'room_id' => $room_id
]);
;
// Renvoyer l’ID de la chambre et joueur
echo json_encode([
    'player1_id' => $pdo->lastInsertId(),
    'room_id' => $room_id
]);


?>