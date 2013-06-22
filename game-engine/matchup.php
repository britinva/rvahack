<?php
class Matchup {

	protected $card1;
	protected $card2;

	function __construct($card1, $card2) {
		$this->card1 = $card1;
		$this->card2 = $card2;
	}

	public function playRound() {
		if ($this->card1 == "scissors") {
			if ($this->card2 == "rock") {
				echo "card2 wins";				
			}
			else if ($this->card2 == "paper") {
				echo "card1 wins";
			}
			else {
				echo "tie";
			}
		}
		else if ($this->card1 == "paper") {
			if ($this->card2 == "rock") {
				echo "card1 wins";				
			}
			else if ($this->card2 == "scissors") {
				echo "card2 wins";
			}
			else {
				echo "tie";
			}		
		}
		else if ($this->card1 == "rock") {
			if ($this->card2 == "paper") {
				echo "card2 wins";				
			}
			else if ($this->card2 == "scissors") {
				echo "card1 wins";
			}
			else {
				echo "tie";
			}		
		}
	}
}

$round1 = new Matchup("rock", "paper");
$round1->playRound();