<?php
/**
 * using mysqli_connect
 */

$databaseHost = 'remotemysql.com';
$databaseName = 'x1aPGuDxqi';
$databaseUsername = 'x1aPGuDxqi';
$databasePassword = '6rmui1SWml';

$mysqli = mysqli_connect(
	$databaseHost, 
	$databaseUsername, 
	$databasePassword, 
	$databaseName
	); 
	
?>
