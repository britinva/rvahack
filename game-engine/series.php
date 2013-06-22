<?php
include_once("round.php");
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
		
		$sqlSeries = $dbConn->prepare("
			SELECT PlayerSeries.seriesId AS sid, seriesName, lastTurn, isReady, Wins, Losses, Ties FROM PlayerSeries, Series 
			WHERE PlayerSeries.seriesId = :seriesId AND PlayerSeries.seriesId = Series.seriesId AND playerId = :playerId
		");
		
		$sqlSeries->bindValue(':seriesId', $seriesId);		
		$sqlSeries->bindValue(':playerId', $playerId);
		$sqlSeries->execute();

		$record = $sqlSeries->fetch();
		$this->seriesName = $record["seriesName"];
		$this->myPicks = unserialize($record["lastTurn"]);
	}
	
	function getPick($x) {
		print_r($this->myPicks->getTurn($x));		
	}
	
	function getName() {
		return $this->seriesName;
	}
	
}

