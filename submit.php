<?php
include_once("game-engine/game.php");
include_once("game-engine/player.php");
session_start();

echo "<h1>Submitting Move</h1>";

$move = new Turn($_POST["move1"], $_POST["move2"], $_POST["move3"]);
$_SESSION["player"]->submitTurn($_POST["seriesid"], $move);

echo "You submitted ".
$_POST["move1"].", ".
$_POST["move2"]." & ".
$_POST["move3"];


//$game1 = new Game($player1, $player2);
//$game1->playGame();

?>