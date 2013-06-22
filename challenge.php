<?php
	include_once("game-engine/player.php");
	include_once("game-engine/challenge.php");
	session_start();

	if(!isset($_SESSION['player'])) {
		header("Location: login.php");
	}

	$opponents = new Challenge($_SESSION['player']->getId()); 

	if (isset($_POST['username'])) {
		if($opponents->createSeries($_SESSION['player']->getId(), $_POST['username'], $_POST['challenge-title'])) {

			header("Location: /index.php");
			exit;	
		}
	}

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

	<?php if (isset($errorMsg)) echo "<p>".$errorMsg."</p>" ?>
	<form action="challenge.php" name="challenge" id="challenge" method="POST">
		<div class="login">
			<h2>Challenge A Friend</h2>
			<input type="hidden" name="myname" value="<?=$_SESSION['player']->getName()?>" />
			<select name="username">
			<? foreach ($opponents->allPlayers as $player): ?>
				<option id="<?=$player["playerId"]?>"><?=$player["playerName"]?></option>
			<? endforeach ?>
			</select>
			<input type="text" name="challenge-title" placeholder="Contest Name" />
			<input type="submit" value="Challenge">
		</div>
		<div class="sign-up">
			<a href="#">Sign Up</a>
		</div>
	</form>

</body>
</html>