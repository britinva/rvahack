<?php
class Player {

	private $playerId;
	private $playerName;
	private $allSeries = array();

	function __construct() {
	}


	public function login ($username, $password) {
		try {
			$dbConn = new PDO('mysql:host=localhost;dbname=rpshack', 'root', 'root');
			$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}

		$login = $dbConn->prepare("SELECT playerId, playerName FROM Players WHERE playerName = :playerName AND password = :password");
		$login->bindValue(':playerName', $username, PDO::PARAM_STR);
		$login->bindValue(':password', $password, PDO::PARAM_STR);
		$login->execute();

		$rows = $login->rowCount();
		if ($rows == 1) {
			$row = $login->fetch();
			//print_r($row);
			$this->playerId = $row["playerId"];
			$this->playerName = $row["playerName"];
			return true;		
		}  else {
			return false;
		}
			
	}
	
	public function getName() {
		return $this->playerName;
	}

	public function getId() {
		return $this->playerId;
	}
	
	private function getAllSeries() {
		try {
			$dbConn = new PDO('mysql:host=localhost;dbname=rpshack', 'root', 'root');
			$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
		
//		$sqlSeries = $dbConn->prepare("SELECT seriesId FROM PlayerSeries WHERE playerId = :playerId");
		$sqlSeries = $dbConn->prepare("SELECT PlayerSeries.seriesId AS sid, seriesName, isReady, Wins, Losses, Ties FROM PlayerSeries, Series 
		WHERE PlayerSeries.seriesId = Series.SeriesId
		AND playerId = :playerId");
		
		
		$sqlSeries->bindValue(':playerId', $this->playerId);
		$sqlSeries->execute();

		unset($this->allSeries);
		while ($row = $sqlSeries->fetch(PDO::FETCH_ASSOC)) {
			$this->allSeries[] = $row;
		}
	}
	
	public function showSeries() {
		$this->getAllSeries();
		foreach($this->allSeries as $x) {
			echo $x["seriesName"]." (".$x["Wins"]."-".$x["Losses"]."-".$x["Ties"].")";
		}
	}
	
	
	
	
}