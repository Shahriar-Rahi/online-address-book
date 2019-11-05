<?php
/**
 * using mysqli_connect
 */

$databaseHost = 'localhost';
$databaseName = 'addbook';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect(
	$databaseHost, 
	$databaseUsername, 
	$databasePassword, 
	$databaseName
	); 
	
?>