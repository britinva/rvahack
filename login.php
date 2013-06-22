<?php
session_start();
include_once("game-engine/player.php");

if (isset($_POST['username'])) {
	$me = new Player();
	if ($me->login($_POST['username'], $_POST['password'])) {
		header("Location: index.php");		
	} else {
		$errorMsg = "Username/Password not found.";
	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
</head>
<body>
	<h1>Log In</h1>
	<?php if (isset($errorMsg)) echo "<p>".$errorMsg."</p>" ?>
	<form action="login.php" name="login" method="POST">
		<input name="username" type="text" placeholder="Username" /><br />
		<input name="password"  type="password" placeholder="Password" /><br />
		<input type="submit" />
	</form>
</body>
</html>