<?php
require 'config.php';

$chambre_id = trim(htmlspecialchars($_POST['chambre_id'], ENT_QUOTES, 'UTF-8'));
$pseudoJ2 = trim(htmlspecialchars($_POST['joueur2'], ENT_QUOTES, 'UTF-8'));

// Vérification des valeurs (évite les requêtes vides)
if (empty($chambre_id) || empty($pseudoJ2)) {
    echo json_encode([
        'success' => false,
        'message' => 'Chambre ID et joueur2 sont requis.'
    ]);
    exit;
}

// Insérer le joueur 2 dans la table joueurs
$sql = "INSERT INTO joueurs (pseudo, chambre_id) VALUES (:pseudoJ2, :chambre_id)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'pseudoJ2' => $pseudoJ2,
    'chambre_id' => $chambre_id
]);

$player2_id = $pdo->lastInsertId(); // Récupération de l'ID du joueur 2

// Mise à jour de la chambre pour passer à "en cours"
$sql = "UPDATE chambres SET etat = 'en cours', joueur2 = :pseudoJ2 WHERE id = :chambre_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'pseudoJ2' => $pseudoJ2,
    'chambre_id' => $chambre_id
]);

// Vérifier si la chambre a bien été mise à jour
if ($stmt->rowCount() > 0) {
    echo json_encode([
        'success' => true,
        'player2_id' => $player2_id,
        'chambre_id' => $chambre_id
    ]);
} else {
    echo json_encode([
        'success' => false, 
        'message' => 'Chambre inexistante ou déjà remplie'
    ]);
}
?>
