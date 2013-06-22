<?php
class Player {

	private $playerID;
	protected $playerName;


	public function login ($username, $password) {
		try {
			$dbConn = new PDO('mysql:host=localhost;dbname=rpshack', 'root', 'root');
			$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
		$login = $dbConn->prepare("SELECT playerName FROM Players WHERE playerName = :playerName AND password = :password");
		$login->bindValue(':playerName', $username, PDO::PARAM_STR);
		$login->bindValue(':password', $password, PDO::PARAM_STR);
		$login->execute();

		$rows = $login->rowCount();
		if ($rows == 1) {
			$row = $login->fetch();
			$_SESSION['username'] = $row["playerName"];
			return true;		
		}  else {
			return false;
		}
			
	}
}