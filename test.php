<?php
include_once("game-engine/game.php");
//include_once("game-engine/turn.php");

try {
	$dbConn = new PDO('mysql:host=localhost;dbname=rpshack', 'root', 'root');
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}

$example = 1;
$selectsql = "SELECT * FROM PlayerSeries WHERE seriesId = :seriesId";
$sqlGetTurns = $dbConn->prepare($selectsql);
$sqlGetTurns->bindParam(":seriesId", $example);
$sqlGetTurns->execute();

$result = $sqlGetTurns->fetchAll();

foreach($result as $row) {
	$player[] = $row["playerId"];
	$teampicks[] = unserialize($row["nextTurn"]);
}

$game = new Game($teampicks[0], $teampicks[1]);
$final = $game->PlayGame();
//print_r($teampicks);

$insertsql = "INSERT INTO Games (player1, player2, series, player1picks, player2picks, player1Score, player2Score)";
$insertsql .= "VALUES (:player1, :player2, :series, :player1picks, :player2picks, :player1Score, :player2score)";

$sqlPutScore = $dbConn->prepare($insertsql);
$sqlPutScore->bindParam(":player1", $player[0]);
$sqlPutScore->bindParam(":player2", $player[1]);
$sqlPutScore->bindParam(":series", $example);
$sqlPutScore->bindParam(":player1picks", serialize($teampicks[0]));
$sqlPutScore->bindParam(":player2picks", serialize($teampicks[1]));
$sqlPutScore->bindParam(":player1Score", $final[0]);
$sqlPutScore->bindParam(":player2score", $final[1]);
$sqlPutScore->execute();
