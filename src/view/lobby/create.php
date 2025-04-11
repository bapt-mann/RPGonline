<div class="menu-container">
    <a href="<?=URL?>">
        <h1 class="game-title">RPG Online</h1>
    </a>
    <h2 class="page-subtitle">Create a Game</h2>
    <div class="form-container">
        <form action="creer.php" method="POST">
            <label for="player-name" class="form-label">Your Name</label>
            <input type="text" id="player-name" name="player_name" class="form-input" required>
            <button type="submit" class="game-button">Create</button>
        </form>
    </div>
</div>