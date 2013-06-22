<?php
include_once("round.php");
include_once("turn.php");

class Game {

	public $numRounds;
	protected $team1picks;
	protected $team2picks;
	protected $score = array();
	
	function __construct(Turn $team1picks, Turn $team2picks) {
		$this->numRounds = 3;
		$this->team1picks = $team1picks;
		$this->team2picks = $team2picks;
		$this->score = array (0, 0);
	}

	function playGame() {
		for($i = 0; $i < $this->numRounds; $i++) {
			$round = new Round($this->team1picks->getTurn($i), $this->team2picks->getTurn($i));
			$result = $round->playRound();
			$this->score[0] = $this->score[0] + $result[0];
			$this->score[1] = $this->score[1] + $result[1];
			//echo "<br>";
		}
		echo "Final Score: ";
		echo $this->score[0]." - ".$this->score[1];
		return array($this->score[0], $this->score[1]);
	}
	
}

