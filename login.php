<?php
session_start();
if (isset($_POST['username'])) {
	try {
		$dbConn = new PDO('mysql:host=localhost;dbname=rpshack', 'root', 'root');
		$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
	$login = $dbConn->prepare("SELECT playerName FROM Players WHERE playerName = :playerName AND password = :password");
	$login->bindValue(':playerName', $_POST['username'], PDO::PARAM_STR);
	$login->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
	$login->execute();
	
	$rows = $login->rowCount();
	if ($rows == 1) {
		$row = $login->fetch();
		$_SESSION['username'] = $row["playerName"];
		header("Location: index.php");		
	}  else {
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