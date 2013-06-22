<?php
class Turn {
	protected $selections = array();
	
	// brute force, three turns. yuck!
	function __construct ($piece1, $piece2, $piece3) {
		$this->selections = array(
			$piece1,
			$piece2,
			$piece3
		);
	}
	
	public function getTurn($x) {
		return $this->selections[$x];
	}
}
/*
echo "<h1>Turn Tests</h1>";

$player1 = new Turn("rock", "paper", "scissors");
$player2 = new Turn("paper", "scissors", "paper");

echo $player1->getTurn(0);
echo "<br>";
echo $player1->getTurn(1);
echo "<br>";
echo $player1->getTurn(2);
echo "<br>";

echo $player2->getTurn(0);
echo "<br>";
echo $player2->getTurn(1);
echo "<br>";
echo $player2->getTurn(2);
echo "<br>";

*/