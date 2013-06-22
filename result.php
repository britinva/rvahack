<?php
include_once("game-engine/game.php");

echo "<h1>Result</h1>";

$player1 = new Turn($_POST["player1-1"], $_POST["player1-2"], $_POST["player1-3"]);
$player2 = new Turn($_POST["player2-1"], $_POST["player2-2"], $_POST["player2-3"]);

$game1 = new Game($player1, $player2);
$game1->playGame();

?>