<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
// including the database connection file
include_once("connection.php");

if(isset($_POST['update'])){
	$id = $_POST['id'];
	
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];	
	
	// checking empty fields
	if(empty($name) || empty($address) || empty($phone)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($address)) {
			echo "<font color='red'>Address field is empty.</font><br/>";
		}
		
		if(empty($phone)) {
			echo "<font color='red'>phone field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE contacts SET name='$name', address='$address', phone='$phone' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
		//exit(header("Location: view.php"));
		//echo("<script>location.href = 'view.php';</script>");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM contacts WHERE id=$id");

while($res = mysqli_fetch_array($result)){
	$name = $res['name'];
	$address = $res['address'];
	$phone = $res['phone'];
}
?>
<html>
	<head>	
		<title>Edit Data</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<a href="index.php">Home</a>
		<a href="view.php">View contacts</a>
		<a href="logout.php">Logout</a>
		
		<form class = "box" name="form1" method="post">
			<input type="text" name="name" value="<?php echo $name;?>">
			<input type="text" name="address" value="<?php echo $address;?>">
			<input type="text" name="phone" value="<?php echo $phone;?>">
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
			<input type="submit" name="update" placeholder = "Update" value ="Update">
		</form>
	</body>
</html>
