<?php

class Challenge {

	public $allPlayers;
	
	function __construct($playerId) {
		try {
			$dbConn = new PDO('mysql:host=localhost;dbname=rpshack', 'root', 'root');
			$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	
		$sqlSeries = $dbConn->prepare("SELECT playerId, playerName from Players WHERE playerId != :playerId");
		$sqlSeries->bindValue(':playerId', $playerId);
		$sqlSeries->execute();
		
		while ($row = $sqlSeries->fetch(PDO::FETCH_ASSOC)) {
			$this->allPlayers[] = $row;
		}
	}
	
	function createSeries($player1, $player2, $title) {
		try {
			$dbConn = new PDO('mysql:host=localhost;dbname=rpshack', 'root', 'root');
			$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
		
		$sqlNewSeries = $dbConn->prepare("INSERT INTO Series (seriesName) VALUES (:seriesName)");
		$sqlNewSeries->bindValue(':seriesName', $title);
		$sqlNewSeries->execute();
		$seriesId = $dbConn->lastInsertId();
	
		$sqlPlayerSeries = $dbConn->prepare("INSERT INTO PlayerSeries (playerId, seriesId) VALUES (:playerId, :seriesId)");
		$sqlPlayerSeries->bindValue(':playerId', $player1);
		$sqlPlayerSeries->bindValue(':seriesId', $seriesId);
		$sqlPlayerSeries->execute();

		$sqlPlayerSeries = $dbConn->prepare("INSERT INTO PlayerSeries (playerId, seriesId) VALUES (:playerId, :seriesId)");
		$sqlPlayerSeries->bindValue(':playerId', $player2);
		$sqlPlayerSeries->bindValue(':seriesId', $seriesId);
		$sqlPlayerSeries->execute();

		return true;
	}
}
