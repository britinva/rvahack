<?php
	include_once("game-engine/player.php");
	include_once("game-engine/series.php");
	session_start();

	if(!isset($_SESSION['player'])) {
		header("Location: login.php");
	}

	function createDropDown($elName) {
		return "
			<select id=\"".$elName."\" name=\"".$elName."\">
				<option value=\"rock\">Rock</option>
				<option value=\"paper\">Paper</option>
				<option value=\"scissors\">Scissors</option>
			</select>			
		";
	}

	$id = $_GET["series"];
	$thisSeries = new series($id, $_SESSION['player']->getId());
	//print_r($_SESSION['player']->allSeries);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RPS+</title>
    <link rel="stylesheet" href="views/css/theme.css">
	<script src="/js/jquery.min.js"></script>
	<script src="/js/rps.js"></script>
</head>
<body>
	<h1><span class="rock">Rock</span> <span class="paper">Paper</span> <span class="scissors">Scissors</span></h1>
	<h2>Series 1 vs Avery</h2>
	<form>
		<input type="hidden" name="seriesid" value="<?=$id?>" />
		<div class="picks">	
			<h3>Round 1</h3>
			<div class="card" id="pick1">
				<?=createDropDown("move1")?>
			</div>

			<h3>Round 2</h3>
			<div class="card" id="pick2">
				<?=createDropDown("move2")?>
			</div>
	
			<h3>Round 3</h3>
			<div class="card" id="pick3">
				<?=createDropDown("move3")?>
			</div>
		
			<input type="submit" value="Save Picks">
		</div>
	</form>		
</body>
</html>