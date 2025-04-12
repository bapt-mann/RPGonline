<div class="menu-container">
    <a href="<?=URL?>">
    <h1 class="game-title title">RPG Online</h1>
    </a>
    <h2 class="page-subtitle title">Join a Game</h2>
    <div class="form-container">
        <form action="rejoindre.php" method="POST">
            <label for="player-name" class="form-label">Your Name</label>
            <input type="text" id="player-name" name="player_name" class="form-input" required>
            <label for="room-id" class="form-label">Room ID</label>
            <input type="text" id="room-id" name="room_id" class="form-input" required>
            <button type="submit" class="game-button">Join</button>
        </form>
    </div>
</div>