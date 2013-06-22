<?php
include_once("round.php");
include_once("turn.php");

class Game {

	public $numRounds;
	protected $team1picks;
	protected $team2picks;
	
	function __construct(Turn $team1picks, Turn $team2picks) {
		$this->numRounds = 3;
		$this->team1picks = $team1picks;
		$this->team2picks = $team2picks;
	}

	function playGame() {
		for($i = 0; $i < $this->numRounds; $i++) {
			$round = new Round($this->team1picks->getTurn($i), $this->team2picks->getTurn($i));
			$round->playRound();
			echo "<br>";
		}
	}
	
}

