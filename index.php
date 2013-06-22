<?php
	include_once("game-engine/player.php");
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
<form name="game" action="result.php" method="POST">
	<h1>RPS Test</h1>
	<!--div>
		Your Series:
		<?=$_SESSION["player"]->showSeries()?>
	</div-->
	
	
	<div id="player1" class="player">
		<h2><?=$_SESSION["player"]->getName()?> (<?=$_SESSION["player"]->getId()?>)</h2>
		<select name="seriesid">
			<option value="">Select Series</option>
			<?php foreach ($_SESSION["player"]->allSeries as $series):?>
				<option value="<?=$series["sid"]?>"><?=$series["seriesName"]?></option>
			<?php endforeach;?>
		</select>
		<ol>
			<li><?=createDropDown("move1")?></li>
			<li><?=createDropDown("move2")?></li>
			<li><?=createDropDown("move3")?></li>
		</ol>
		<input type="submit" />
	</div>
</form>
<p><a href="logout.php">Logout</a></p>
</body>
</html>