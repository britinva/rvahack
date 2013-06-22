<?php
	include_once("game-engine/player.php");
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
	
	$_SESSION['player']->refresh();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RPS+</title>
    <link rel="stylesheet" href="views/css/theme.css">
</head>
<body>

	<h1><span class="rock">Rock</span> <span class="paper">Paper</span> <span class="scissors">Scissors</span></h1>

	<h2>Existing Games</h2>
	<ul class="listview">
		<?php foreach($_SESSION["player"]->allSeries as $series):?>
		<li class="ready"><a href="picks.php?series=<?=$series["sid"]?>">
			<?=$series["seriesName"]?>
			<span>(<?=$series["Wins"]?>-<?=$series["Losses"]?>-<?=$series["Ties"]?>)</span>
		</a></li>
		<?php endforeach;?>
	</ul>	
	
	<h2>New Challenge</h2>		
	<ul class="listview">
		<li><a href="#">Invite a Friend</a></li>
	</ul>		

	<p style="float: right; margin-right: 10px;"><a href="logout.php">Logout</a></p>
</body>
</html>