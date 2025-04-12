<?php
$roomId = $room["roomId"];
$player1id = $room["player1_id"];
$player1name = $room["player1Name"];
?>
<div class="menu-container">
    <a href="<?=URL?>">
        <h1 class="game-title title">RPG Online</h1>
    </a>
    <h2 class="page-subtitle title">Waiting Room</h2>
    <h3 class="title">Room n°<?=$roomId?></h3>
    <div class="waiting-room-container">
        <!-- Player Cards (Left Side) -->
        <div class="players-container">
            <!-- Player 1 Card -->
            <div class="player-card" id="player-1">
                <div class="profile-placeholder">Profile Pic</div>
                <div class="player-name"><?=$player1name?></div>
                <div class="characters-container">
                    <div class="character-placeholder">Char 1</div>
                    <div class="character-placeholder">Char 2</div>
                    <div class="character-placeholder">Char 3</div>
                </div>
                <button class="ready-button" onclick="toggleReady('player-1')">Ready</button>
            </div>
            <!-- Player 2 Card -->
            <div class="player-card" id="player-2">
                <div class="profile-placeholder">Profile Pic</div>
                <div class="player-name">Player 2</div>
                <div class="characters-container">
                    <div class="character-placeholder">Char 1</div>
                    <div class="character-placeholder">Char 2</div>
                    <div class="character-placeholder">Char 3</div>
                </div>
                <button class="ready-button" onclick="toggleReady('player-2')">Ready</button>
            </div>
        </div>
        <!-- Chatbox and Start Button (Right Side) -->
        <div class="chat-container">
            <div class="chatbox">Chatbox (Coming Soon)</div>
            <button class="game-button">Start Game</button>
        </div>
    </div>
</div>

<script>
    function toggleReady(playerId) {
        const playerCard = document.getElementById(playerId);
        const readyButton = playerCard.querySelector('.ready-button');
        playerCard.classList.toggle('ready');
        readyButton.classList.toggle('active');
        readyButton.textContent = readyButton.classList.contains('active') ? 'Unready' : 'Ready';
    }
</script>