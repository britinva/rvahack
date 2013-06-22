<?php
	function createDropDown($elName) {
		return "
			<select id=\"".$elName."\" name=\"".$elName."\">
				<option value=\"\">Select piece</option>
				<option value=\"rock\">Rock</option>
				<option value=\"paper\">Paper</option>
				<option value=\"scissors\">Scissors</option>
			</select>			
		";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>RPS: Test</title>
</head>
<body>
<form name="game" action="result.php" method="post">
	<h1>RPS Test</h1>
	<div id="player1" class="player">
			<h2>Player 1</h2>
			<ol>
				<li><?=createDropDown("player1-1")?></li>
				<li><?=createDropDown("player1-2")?></li>
				<li><?=createDropDown("player1-3")?></li>
			</ol>
			<input type="submit" />
	</div>
	<div id="player2" class="player">
			<h2>Player 2</h2>
			<ol>
				<li><?=createDropDown("player2-1")?></li>
				<li><?=createDropDown("player2-2")?></li>
				<li><?=createDropDown("player2-3")?></li>
			</ol>
			<input type="submit" />
	</div>
</form>
</body>
</html>