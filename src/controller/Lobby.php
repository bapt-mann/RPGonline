<?php
use Core\Controller;
use Core\Model;

class Lobby extends Controller
{
    public function __construct() {}
    public function createGame($id = null):void
    {
        try {

            if($_POST["player_name"] == "") {
                $_SESSION["wrongInput"] = 1;
                header("Location: ".$_SERVER["HTTP_REFERER"]);
            }
            $pdo = Model::connect();
            
            // Sets the player in DB (no memorization of user)
            $playerName = $_POST["player_name"];
            $playersT = Model::load("players");
            $dataPlayer["pseudo"] = $playerName;
            $playersT->insert($pdo, $dataPlayer);
            
            // Sets the room in DB
            $playerId = $pdo->lastInsertId();
            $roomsT = Model::load("rooms");
            $dataRoom["player1_id"] = $playerId;
            $roomsT->insert($pdo, $dataRoom);
            
            // Gets the room id and player id to view
            $var["room"] = array(
                "roomId" => $pdo->lastInsertId(),
                "player1_id" => $playerId,
                "player1Name" => $playerName
            );
            $roomsT::disconnect();
            $playersT::disconnect();
        } catch (Exception $e) {
            var_dump($e);
            $var["response"] = "An error occured while creating a game.";
        } finally {
        }
        
        $this->set($var);
        $this->render("waitingRoom");
    }
    public function create($id = null): void
    {
        $this->render("create");
    }
    public function join($id = null): void
    {
        $this->render("join");
    }
}
?>