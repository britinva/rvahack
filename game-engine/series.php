<?php
//include_once("round.php");
include_once("turn.php");

class Series {

	protected $seriesName;
	protected $myPicks;
	
	
	function __construct($seriesId, $playerId) {
		try {
			$dbConn = new PDO('mysql:host=localhost;dbname=rpshack', 'root', 'root');
			$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
		
		$sqlSeries = $dbConn->prepare("SELECT PlayerSeries.seriesId AS sid, seriesName, isReady, Wins, Losses, Ties FROM PlayerSeries, Series 
		WHERE PlayerSeries.seriesId = :seriesId
		AND playerId = :playerId");
		
		$sqlSeries->bindValue(':seriesId', $seriesId);		
		$sqlSeries->bindValue(':playerId', $playerId);
		$sqlSeries->execute();


		$rows = $sqlSeries->rowCount();
		if ($rows == 1) {
			$row = $sqlSeries->fetch();
			//print_r($row);
			$this->seriesName = $row["seriesName"];
			$this->myPicks = serialize($row["lastTurn"]);
		}  else {
			return false;
		}
	}
	
}

