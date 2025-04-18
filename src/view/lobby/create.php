<div class="menu-container">
    <a href="<?=URL?>">
    <h1 class="game-title title">RPG Online</h1>
    </a>
    <h2 class="page-subtitle title">Create a Game</h2>
    <div class="form-container">
        <form action="<?=URL?>Lobby/createGame" method="POST">
            <label for="player-name" class="form-label">Your Name</label>
            <input type="text" id="player-name" name="player_name" class="form-input" required>
            <button type="submit" class="game-button">Create</button>
            <?php
            if(isset($_SESSION["wrongInput"])) {
                echo "<p class=\"form-label\">Please add a valid name.</p>";
                $_SESSION["wrongInput"] = null;
            }
            ?>
        </form>
    </div>
</div>