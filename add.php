<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
	<head>
		<title>Add Data</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
	<?php
	//including the database connection file
	include_once("connection.php");

	if(isset($_POST['Submit'])) {	
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$loginId = $_SESSION['id'];
			
		// checking empty fields
		if(empty($name) || empty($address) || empty($phone)) {
					
			if(empty($name)) {
				echo "<font color='red'>Name field is empty.</font><br/>";
			}
			
			if(empty($address)) {
				echo "<font color='red'>Quantity field is empty.</font><br/>";
			}
			
			if(empty($phone)) {
				echo "<font color='red'>phone field is empty.</font><br/>";
			}
			
			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else { 
			// if all the fields are filled (not empty) 
				
			//insert data to database	
			$result = mysqli_query($mysqli, "INSERT INTO contacts(name, address, phone, user_id) VALUES('$name','$address','$phone', '$loginId')");
			
			//display success message
			echo "<font color='white'>Data added successfully...";
			echo "<br/><a href='view.php'>View Result</a>";
		}
	}
	?>
	</body>
</html>
