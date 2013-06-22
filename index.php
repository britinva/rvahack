<?php
	session_start();
	if(!isset($_SESSION['player'])) {
		header("Location: login.php");
	}

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
			<h2><?=$_SESSION['player']?></h2>
			<ol>
				<li><?=createDropDown("player1-1")?></li>
				<li><?=createDropDown("player1-2")?></li>
				<li><?=createDropDown("player1-3")?></li>
			</ol>
			<input type="submit" />
	</div>
</form>
<p><a href="logout.php">Logout</a></p>
</body>
</html>