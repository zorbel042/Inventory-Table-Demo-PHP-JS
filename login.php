<?php

require('php-files/db_connect.php');

// Assigning POST values to variables.
// $username = (string)$_POST['username'];
// $password = (string)$_POST['password'];

// // Prevent SQL Injection
// $username = mysqli_real_escape_string($connection, $username);
// $password = mysqli_real_escape_string($connection, $password);

$username = "Admin";
$password = "1234";

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `users` WHERE username like '$username' and password='$password'";

// $query = "SELECT * FROM demo_table";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count >= 1){ 

	session_start();

	$row = mysqli_fetch_array($result);

	// CREATES SESSION VARIABLES BEFORE SENDING USER TO HOME

	$_SESSION['userID'] = $row['id'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['fullName'] = $row['fullName'];
	$_SESSION['isDOW'] = $row['isDOW'];
	$_SESSION['stores_ID'] = $row['stores_ID'];
	$_SESSION['SMS'] = $row['SMS'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['role'] = $row['role'];
 
	header("location: v1.0/home.php");

} else {

	header("location: index.php?il=1");

}

?>
