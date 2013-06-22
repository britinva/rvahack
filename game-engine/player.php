<?php
class Player {

	private $dbConn;
	private $playerId;
	private $playerName;

	function __construct() {
		try {
			$this->dbConn = new PDO('mysql:host=localhost;dbname=rpshack', 'root', 'root');
			$this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}

	public function login ($username, $password) {
		$login = $this->dbConn->prepare("SELECT * FROM Players WHERE playerName = :playerName AND password = :password");
		$login->bindValue(':playerName', $username, PDO::PARAM_STR);
		$login->bindValue(':password', $password, PDO::PARAM_STR);
		$login->execute();

		$rows = $login->rowCount();
		if ($rows == 1) {
			$row = $login->fetch();
			$this->playerId = $row["playerId"];
			$this->playerName = $row["playerName"];
			$_SESSION['username'] = $this->playerName;
			return true;		
		}  else {
			return false;
		}			
	}
	
	
	private function getSeries() {
		$getSeries = $this->dbConn->prepare("SELECT * FROM PlayerSeries WHERE playerId = :playerId");
	}
	
	
}