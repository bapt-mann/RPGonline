<?php
require 'config.php';

$room_id = trim(htmlspecialchars($_POST['room_id'], ENT_QUOTES, 'UTF-8'));
$pseudoP2 = trim(htmlspecialchars($_POST['player2'], ENT_QUOTES, 'UTF-8'));

// Vérification des valeurs (évite les requêtes vides)
if (empty($room_id) || empty($pseudoP2)) {
    echo json_encode([
        'success' => false,
        'message' => 'Chambre ID et joueur2 sont requis.'
    ]);
    exit;
}

// Insérer le joueur 2 dans la table players
$sql = "INSERT INTO players (pseudo, room_id) VALUES (:pseudoP2, :room_id)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'pseudoP2' => $pseudoP2,
    'room_id' => $room_id
]);

$player2_id = $pdo->lastInsertId(); // Récupération de l'ID du joueur 2

// Mise à jour de la chambre pour passer à "en cours"
$sql = "UPDATE rooms SET state = 'en cours', joueur2 = :pseudoP2 WHERE id = :room_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'pseudoP2' => $pseudoP2,
    'room_id' => $room_id
]);

// Vérifier si la chambre a bien été mise à jour
if ($stmt->rowCount() > 0) {
    echo json_encode([
        'success' => true,
        'player2_id' => $player2_id,
        'room_id' => $room_id
    ]);
} else {
    echo json_encode([
        'success' => false, 
        'message' => 'Chambre inexistante ou déjà remplie'
    ]);
}
?>
