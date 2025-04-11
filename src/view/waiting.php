<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting Screen</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/waitingScript.js" defer></script>
</head>
<body>
    <div>
        <h1>ID de la chambre : </h1>
        <h1 id="room_id"></h1>
    </div>
    <div>
        <h1>classes et compétences du jeu :</h1>
        <div>
            <?php
                for($i = 1; $i < 7; $i++){
                    echo '<button>class' . $i . '</button>';
                }
            ?>
        </div>
        <button id="ready">Prêt</button>
        <br>
        <h1 id="player_id"></h1>
    </div>
</body>
</html>