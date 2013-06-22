<?php
session_start();
include_once("game-engine/player.php");

if (isset($_POST['username'])) {
	$me = new Player();
	if ($me->login($_POST['username'], $_POST['password'])) {
		$_SESSION["player"] = $me;
		header("Location: /index.php");
		exit;	
	} else {
		$errorMsg = "Username/Password not found.";
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
</head>
<body>
	<h1><span class="rock">Rock</span> <span class="paper">Paper</span> <span class="scissors">Scissors</span></h1>

	<?php if (isset($errorMsg)) echo "<p>".$errorMsg."</p>" ?>
	<form action="login.php" name="login" method="POST">
		<div class="login">
			<input name="username" type="text" placeholder="username" />
			<input name="password" type="password" placeholder="password" />
			<input type="submit" value="Login">
		</div>
		<div class="sign-up">
			<a href="#">Sign Up</a>
		</div>
	</form>

</body>
</html>