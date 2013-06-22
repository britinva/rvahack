<?php
include_once("round.php");

class Game {

	public $numRounds;
	protected $team1picks = array();
	protected $team2picks = array();
	
	function __construct() {
		$this->numRounds = 3;
		$this->team1picks = array(
			'paper',
			'rock',
			'paper'
		);
		$this->team2picks = array(
			'rock',
			'scissors',
			'scissors',
		);
	}

	function playGame() {
		for($i = 0; $i < $this->numRounds; $i++) {
			$round = new Round($this->team1picks[$i], $this->team2picks[$i]);
			$round->playRound();
			echo "<br>";
		}
	}
	
}

echo "<h1>Game Tests</h1>"

$match1 = new Game();
$match1->playGame();
