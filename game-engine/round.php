<?php
class Round {

	protected $card1;
	protected $card2;

	function __construct($card1, $card2) {
		$this->card1 = $card1;
		$this->card2 = $card2;
	}

	public function playRound() {
		if ($this->card1 == "scissors") {
			if ($this->card2 == "rock") {
				return array (0, 1);
			}
			else if ($this->card2 == "paper") {
				return array (1, 0);
			}
			else {
				return array (0, 0);
			}
		}
		else if ($this->card1 == "paper") {
			if ($this->card2 == "rock") {
				return array (1, 0);
			}
			else if ($this->card2 == "scissors") {
				return array (0, 1);
			}
			else {
				return array (0, 0);
			}		
		}
		else if ($this->card1 == "rock") {
			if ($this->card2 == "scissors") {
				return array (1, 0);
			}
			else if ($this->card2 == "paper") {
				return array (0, 1);
			}
			else {
				return array (0, 0);
			}		
		}
	}
}

