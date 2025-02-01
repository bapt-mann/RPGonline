<?php
require 'config.php'; // Connexion à la base

if (!isset($_POST['joueur1'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Le champ joueur1 est manquant.'
    ]);
    exit;
}

$pseudoJ1 = trim(htmlspecialchars($_POST['joueur1'], ENT_QUOTES, 'UTF-8'));



// Créer une nouvelle chambre
$sql = "INSERT INTO chambres (etat, joueur1) VALUES ('en attente', :pseudoJ1)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'pseudoJ1' => $pseudoJ1
]);
$chambre_id = $pdo->lastInsertId();

// Créer joueur
$sql = "INSERT INTO joueurs (pseudo, chambre_id) VALUES (:pseudoJ1, :chambre_id)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'pseudoJ1' => $pseudoJ1,
    'chambre_id' => $chambre_id
]);
;
// Renvoyer l’ID de la chambre et joueur
echo json_encode([
    'player1_id' => $pdo->lastInsertId(),
    'chambre_id' => $chambre_id
]);


?>