<?php session_start(); ?>
<html>
	<head>
		<title>Login</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 	 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
	<a href="index.php">Home</a> <br />
	<?php
	include("connection.php");

	if(isset($_POST['submit'])) {
		$user = mysqli_real_escape_string($mysqli, $_POST['username']);
		$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

		if($user == "" || $pass == "") {
			echo "Either username or password field is empty.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		} else {
			$result = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$user' AND password=md5('$pass')")
						or die("Could not execute the select query.");
			
			$row = mysqli_fetch_assoc($result);
			
			if(is_array($row) && !empty($row)) {
				$validuser = $row['username'];
				$_SESSION['valid'] = $validuser;
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
			} else {
				echo "Invalid username or password.";
				echo "<br/>";
				echo "<a href='login.php'>Go back</a>";
			}

			if(isset($_SESSION['valid'])) {
				header('Location: index.php');			
			}
		}
	} else {
	?>
		<form class = "box" name="form1" method="post" action="login.php">
			<input type="text" name="username" placeholder = "Username">
			<input type="password" name="password" placeholder = "Password">
			<input type="submit" name="submit" placeholder = "Login" value ="Submit">
		</form>
	<?php
	}
	?>
	</body>
</html>
